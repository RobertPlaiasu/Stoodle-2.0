<?php

namespace App\Http\Controllers;

use App\Subject;
use App\SubjectType;
use App\User;
use Illuminate\Http\Request;
use App\CustomClass\PanelText;

class SubjectController extends Controller
{
    use AdminTrait;

    private $text;
    private $hasType;

    public function __construct()
    {
        $this->hasType = true;
        $this->text = new PanelText( 'Subiecte', 'subiect', 'subject' );
        $this->middleware(['auth', 'verified', 'admin']);
    }

    public function index()
    {
        return view('admin.show')
            ->with( 'data', Subject::all() )
            ->with( 'text', $this->text );
    }

    public function create()
    {
        return view('admin.create')
            ->with( 'data', SubjectType::all() )
            ->with( 'text', $this->text )
            ->with( 'hasType', $this->hasType );
    }

    public function store( Request $request )
    {
        $request->validate([
            'nume' => 'required|max:255|unique:subjects,name',
            'tip' => 'required|exists:subject_types,id'
        ]);

        $subject = new Subject;
        $this->saveSubject( $subject, $request );
        
        return redirect( 'admin/subject' );
    }

    public function edit( Subject $subject )
    {
        return view( 'admin.edit' )
            ->with( 'typeSelected', $subject->subjectType()->pluck('subject_type_id')->toArray() )
            ->with( 'item', $subject )
            ->with( 'data', SubjectType::all() )
            ->with( 'hasType', $this->hasType )
            ->with( 'text', $this->text );
    }

    public function update( Request $request, Subject $subject )
    {
        $request->validate([
            'nume' => 'required|max:255',
            'tip' => 'required|exists:subject_types,id'
        ]);
        
        $this->saveSubject( $subject , $request );
        
        return redirect( 'admin/subject/' );
    }

    public function destroy( Subject $subject )
    {
        $subject->delete();
        return redirect( '/admin/subject' );
    }

    private function saveSubject( $subject, $request )
    {
        $this->saveData( $subject, $request );
        $subject->subjectType()->sync( $request->type );
        $subject->save();
    }
}
