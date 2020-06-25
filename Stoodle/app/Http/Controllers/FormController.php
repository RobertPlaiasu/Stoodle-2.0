<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;

use App\County;
use App\Passion;
use App\Book;
use App\Subject;
use App\Profil;

class FormController extends Controller
{
    public function index(){
        $counties = County::all();
        $passion = Passion::all();
        $book = Book::all();
        $subject = Subject::all();
        $profil = Profil::all();
        return view('form', [ 'counties' => $counties, 'passions' => $passion, 'books' => $book, 'subjects' => $subject, 'profils' => $profil ] );
    }
}
