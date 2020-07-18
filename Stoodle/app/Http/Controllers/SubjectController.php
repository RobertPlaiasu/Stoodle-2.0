<?php

namespace App\Http\Controllers;

use App\Subject;
use App\SubjectType;
use App\User;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource( User::class );
    }

    public function index()
    {
        $data = subject::all();
        $text = 'subject';
        return view('admin.show', compact( 'data', 'text' ));
    }

    public function create()
    {
        $data = subjectType::all();
        $text = 'subject';
        $hasType = true;
        return view('admin.create', compact( 'data', 'text', 'hasType' ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $subject = new subject;
        $subject->name = $request->name;
        $subject->timestamps = false;
        $subject->save();
        $subject->subjectType()->attach( $request->type );
        $subject->save();
        
        return redirect('admin/subject');
    }

    public function edit( $id )
    {
        $item = subject::findOrFail( $id );
        $text = 'subject';
        return view('admin.edit', compact( 'item', 'text' ));
    }

    public function update(Request $request,$id )
    {
        $request->validate([
            'name' => 'required'
        ]);
        
        $item = subject::findOrFail( $id ); 
        $item->name = $request->name;
        $item->timestamps = false;
        $item->save();
        
        return redirect('admin/subject/');
    }

    public function destroy( $id )
    {
        $item = subject::findOrFail( $id ); 
        $item->delete();
        return redirect('/admin/subject');
    }
}
