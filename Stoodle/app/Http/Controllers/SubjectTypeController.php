<?php

namespace App\Http\Controllers;

use App\SubjectType;
use Illuminate\Http\Request;

class SubjectTypeController extends Controller
{
    public function index(){
        $subjectTypes = SubjectType::all();
        return view('subjectType', [ 'subjectTypes' => $subjectTypes ] );
    }

    public function create()
    {
        return view('subjectType.create');
    }

    public function store(Request $request)
    {

    }
}
