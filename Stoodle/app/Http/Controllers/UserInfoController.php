<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UserInfo extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $counties = County::all();
        $passion = Passion::all();
        $book = Book::all();
        $subject = Subject::all();
        $profil = Profil::all();
        return view('form', [ 'counties' => $counties, 'passions' => $passion, 'books' => $book, 'subjects' => $subject, 'profils' => $profil ] );
    }
}
