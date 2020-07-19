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
        $this->middleware(['auth', 'verified', 'admin']);
    }

    public function index()
    {
        $data = Subject::all();
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

        $subject = new Subject;
        $subject->name = $request->name;
        $subject->timestamps = false;
        $subject->save();
        $subject->subjectType()->attach( $request->type );
        $subject->save();
        
        return redirect('admin/subject');
    }

    public function edit( Subject $subject )
    {
        $item = $subject;
        $text = 'subject';
        return view('admin.edit', compact( 'item', 'text' ));
    }

    public function update(Request $request, Subject $subject )
    {
        $request->validate([
            'name' => 'required'
        ]);
        
        $subject->name = $request->name;
        $subject->timestamps = false;
        $subject->save();
        
        return redirect('admin/subject/');
    }

    public function destroy( Subject $subject )
    {
        $subject->delete();
        return redirect('/admin/subject');
    }
}
