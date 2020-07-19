<?php

namespace App\Http\Controllers;

use App\University;
use App\User;
use Illuminate\Http\Request;

class UniversityController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'admin', 'checkForm']);    
    }

    public function index()
    {
        $data = university::all();
        $text = 'university';
        return view('admin.show', compact( 'data', 'text' ));
    }

    public function create()
    {
        $data = NULL;
        $text = 'university';
        $hasType = false;
        return view('admin.create', compact( 'data', 'text', 'hasType' ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $university = new university;
        $university->name = $request->name;
        $university->timestamps = false;
        $university->save();
        
        return redirect('admin/university');
    }

    public function edit( $id )
    {
        $item = university::findOrFail( $id );
        $text = 'university';
        return view('admin.edit', compact( 'item', 'text' ));
    }

    public function update(Request $request,$id )
    {
        $request->validate([
            'name' => 'required'
        ]);
        
        $item = university::findOrFail( $id ); 
        $item->name = $request->name;
        $item->timestamps = false;
        $item->save();
        
        return redirect('admin/university/');
    }

    public function destroy( $id )
    {
        $item = university::findOrFail( $id ); 
        $item->delete();
        return redirect('/admin/university');
    }
}
