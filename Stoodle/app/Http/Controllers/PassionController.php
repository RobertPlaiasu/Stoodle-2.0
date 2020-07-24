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

        $this->middleware(['auth', 'verified', 'admin']);
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
            'name' => 'required|unique:passions,name|max:255',
            'type' => 'required|exists:passion_types,id'
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
        $hasType = true;
        $data = PassionType::all();
        $typeSelected = $passion->passionType()->pluck('passion_type_id')->toArray();
        return view('admin.edit', compact( 'item', 'text','hasType','data','typeSelected'));
    }

    public function update(Request $request, Passion $passion )
    {
        $request->validate([
            'name' => 'required|max:255',
            'type' => 'required|exists:passion_types,id'
        ]);
        
        $passion->name = $request->name;
        $passion->timestamps = false;
        $passion->save();
        $passion->passionType()->sync($request->type);
        $passion->save();

        return redirect('admin/passion');
    }

    public function destroy( Passion $passion )
    {
        $passion->delete();
        return redirect('admin/passion');
    }
}
