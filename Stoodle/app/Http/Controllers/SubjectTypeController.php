<?php

namespace App\Http\Controllers;

use App\SubjectType;
use Illuminate\Http\Request;

class SubjectTypeController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource( User::class );
    }

    public function index()
    {
        $data = subjectType::all();
        $text = 'subjectType';
        return view('admin.show', compact( 'data', 'text' ));

    }

    public function create()
    {
        $data = subjectType::all();
        $text = 'subjectType';
        $hasType = false;
        return view('admin.create', compact( 'data', 'text', 'hasType' ));

    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $profil = new subjectType;
        $profil->type = $request->name;
        $profil->timestamps = false;
        $profil->save();
        
        return redirect()->back();
    }

    public function edit( $id )
    {
        $item = subjectType::findOrFail( $id );
        $text = 'subjectType';
        return view('admin.edit', compact( 'item', 'text' ));
    }

    public function update(Request $request,$id )
    {
        $request->validate([
            'name' => 'required'
        ]);
        
        $item = subjectType::findOrFail( $id ); 
        $item->type = $request->name;
        $item->timestamps = false;
        $item->save();
        
        return redirect('admin/subjectType/');
    }

    public function destroy( $id )
    {
        $item = subjectType::findOrFail( $id ); 
        $item->delete();
        return redirect()->back();

    }
}
