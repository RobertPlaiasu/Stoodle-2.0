<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfoUserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function index()
    {
        $counties = County::all();
        $passion = Passion::all();
        $book = Book::all();
        $subject = Subject::all();
        $profil = Profil::all();
        return view('/form', [ 'counties' => $counties, 'passions' => $passion,
                              'books' => $book, 'subjects' => $subject, 'profils' => $profil ]);
    }

    public function store(Request $request)
    {
        $data =  $request->validate([
            'passion' => 'required|exists:passions,id',
            'passionIntensity' => 'required|max:1|regex:/^[1-5]+/',
            'class-1' => 'required|exists:passions,id',
            'class-2' => 'required|exists:passions,id',
            'class-3' => 'required|exists:passions,id',
            'branch' => 'required|exists:passions,id',
            'stress' => 'required|boolean',
            'job' => 'required|boolean',
            'books' => 'required|exists:passions,id',
            'county' => 'required|exists:passions,id',
            'social' => 'required|boolean',
            'sport' => 'required|boolean'
        ]);
        
            $userData = array(

            );

            $userSubject = array(
                ['subject_id'=>$request->input('class-1')],
                [],
                [],
            );

        DB::table('users')->insert($userData);

        DB::table('subject_user')->insert($userSubject);
    }
}
