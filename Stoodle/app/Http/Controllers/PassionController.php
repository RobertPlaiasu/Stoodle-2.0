<?php

namespace App\Http\Controllers;

use App\Passion;
use App\PassionType;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PassionController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['auth', 'verified', 'admin', 'checkForm']);
        $this->authorizeResource( User::class );
    }

    public function index()
    {
        $data = passion::all();
        $text = 'passion';
        return view('admin.show', compact( 'data', 'text' ));
    }

    public function create()
    {
        $data = passionType::all();
        $text = 'passion';
        $hasType = true;
        return view('admin.create', compact( 'data', 'text', 'hasType' ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $passion = new passion;
        $passion->name = $request->name;
        $passion->timestamps = false;
        $passion->save();
        $passion->passionType()->attach( $request->type );
        $passion->save();
        
        return redirect('admin/passion');
    }

    public function edit( $id )
    {
        $item = passion::findOrFail( $id );
        $text = 'passion';
        return view('admin.edit', compact( 'item', 'text' ));
    }

    public function update(Request $request,$id )
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required'
        ]);
        
        $item = passion::findOrFail( $id ); 
        $item->name = $request->name;
        $item->timestamps = false;
        $item->save();

        return redirect('admin/passion/');
    }

    public function destroy( $id )
    {
        $item = passion::findOrFail( $id ); 
        $item->delete();
        return redirect('/admin/passion');
    }
}
