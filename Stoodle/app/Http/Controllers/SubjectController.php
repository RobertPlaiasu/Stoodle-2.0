<?php

namespace App\Http\Controllers;

use App\Subject;
use App\SubjectType;
use App\User;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    use AdminTrait;

    private $text = 'subject';
    private $hasType = true;

    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'admin']);
    }

    public function index()
    {
        return view('admin.show')->with('data',Subject::all())
                                 ->with('text',$this->text);
    }

    public function create()
    {
        return view('admin.create')->with('data',SubjectType::all())
                                    ->with('text',$this->text)
                                    ->with('hasType',$this->hasType);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|unique:subjects,name',
            'type' => 'required|exists:subject_types,id'
        ]);

        $subject = new Subject;
        $this->saveSubject($subject,$request);
        
        return redirect('admin/subject');
    }

    public function edit( Subject $subject )
    {
        return view('admin.edit')->with('typeSelected',$subject->subjectType()->pluck('subject_type_id')->toArray())
                                ->with('item',$subject)
                                ->with('data',SubjectType::all())
                                ->with('hasType',$this->hasType)
                                ->with('text',$this->text);
    }

    public function update(Request $request, Subject $subject )
    {
        $request->validate([
            'name' => 'required|max:255',
            'type' => 'required|exists:subject_types,id'
        ]);
        
        $this->saveSubject($subject , $request);
        
        return redirect('admin/subject/');
    }

    public function destroy( Subject $subject )
    {
        $subject->delete();
        return redirect('/admin/subject');
    }

    private function saveSubject($subject,$request)
    {
        $this->saveData($subject,$request);
        $subject->subjectType()->sync( $request->type);
        $subject->save();
    }
}
