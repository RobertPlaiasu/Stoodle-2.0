<?php

namespace App\Http\Controllers;

use App\Passion;
use App\PassionType;
use App\User;
use Illuminate\Http\Request;

class PassionController extends Controller
{
    public function __construct()
    {

        $this->middleware(['auth', 'verified', 'admin', 'checkForm']);
    }

    public function index()
    {
        $data = Passion::all();
        $text = 'passion';
        return view('admin.show', compact( 'data', 'text' ));
    }

    public function create()
    {
        $data = PassionType::all();
        $text = 'passion';
        $hasType = true;
        return view('admin.create', compact( 'data', 'text', 'hasType' ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $passion = new Passion;
        $passion->name = $request->name;
        $passion->timestamps = false;
        $passion->save();
        $passion->passionType()->attach( $request->type );
        $passion->save();
        
        return redirect('admin/passion');
    }

    public function edit( Passion $passion )
    {
        $item = $passion;
        $text = 'passion';
        return view('admin.edit', compact( 'item', 'text' ));
    }

    public function update(Request $request, Passion $passion )
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required'
        ]);
        
        $passion->name = $request->name;
        $passion->timestamps = false;
        $passion->save();

        return redirect('admin/passion/');
    }

    public function destroy( Passion $passion )
    {
        $passion->delete();
        return redirect('/admin/passion');
    }
}
