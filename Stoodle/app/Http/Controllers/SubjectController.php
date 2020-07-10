<?php

namespace App\Http\Controllers;

use App\Subject;
use App\SubjectType;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index(){
        $subjects = Subject::all();
        return view('subject', [ 'subjects' => $subjects ] );
    }

    public function create()
    {
        $subjectTypes = SubjectType::all();
        return view('subject.create',['subjectTypes' => $subjectTypes]);
    }

    public function store(Request $request)
    {

    }
}
