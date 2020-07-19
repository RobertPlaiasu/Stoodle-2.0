<?php

namespace App\Http\Controllers;


use App\passionType;

use Illuminate\Http\Request;
use App\User;

class passionTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'admin', 'checkForm']);    
    }

    public function index()
    {
        $data = passionType::all();
        $text = 'passionType';
        return view('admin.show', compact( 'data', 'text' ));
    }

    public function create()
    {
        $data = passionType::all();
        $text = 'passionType';
        $hasType = false;
        return view('admin.create', compact( 'data', 'text', 'hasType' ));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required'
        ]);

        $profil = new passionType;
        $profil->type = $request->name;
        $profil->timestamps = false;
        $profil->save();
        
        return redirect()->back();
    }

    public function edit( $id )
    {
        $item = passionType::findOrFail( $id );
        $text = 'passionType';
        return view('admin.edit', compact( 'item', 'text' ));
    }

    public function update(Request $request,$id )
    {
        $request->validate([
            'name' => 'required'
        ]);
        
        $item = passionType::findOrFail( $id ); 
        $item->type = $request->name;
        $item->timestamps = false;
        $item->save();
        
        return redirect('admin/passionType');
    }

    public function destroy( $id )
    {
        $item = passionType::findOrFail( $id ); 
        $item->delete();
        return redirect()->back();

    }
}
