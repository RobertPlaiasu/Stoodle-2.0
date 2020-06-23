<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class QuestionController extends Controller {
    public function index(){
        $questions = DB::select('select * from questions');
        return view('questions', [ 'questions' => $questions ] );
    }
}