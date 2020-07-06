<?php

namespace App\Http\Controllers;

use App\User;
use App\County;
use App\Passion;
use App\Book;
use App\Subject;
use App\Profil;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public static function index ()
    {
        $counties = County::all();
        $passion = Passion::all();
        $book = Book::all();
        $subject = Subject::all();
        $profil = Profil::all();

        return [ 
            'counties' => $counties, 
            'passions' => $passion, 
            'books' => $book, 
            'subjects' => $subject, 
            'profils' => $profil 
        ];
    }

    public static function generateUserFormText ()
    {
        return [
            'De ce esti pasionat?',
            'Cat de pasionat esti?',
            'Ce materii iti plac?',
            'Pe ce profil esti?',
            'Poti face fata unor situatii strsante?',
            'Iti doresti un part-time job?',
            'Ce tip de carti citesti?',
            'Din ce judet esti?',
            'Trebuie ca elevul ideal sa fie sociabil?',
            'Practici vreun sport?'
        ];
    }

    public static function generateCollegeFormText ()
    {
        return [
            'Pasiune ideala',
            'Necisita facultatea admintere?',
            'Materii ideale',
            'Profil ideal',
            'Trebuie ca elevul sa faca fata situatiilor stresante?',
            'Isi permite un elev mediocru sa aiba un job part-time?',
            'Ce tip de carti trebuie sa citeasca elevul ideal?',
            'Judetul in care se afla facultatea',
            'Trebuie ca elevul ideal sa fie sociabil?',
            'Trebuie ca elevul ideal sa practice un sport in timpul liber?',
        ];
    }
}
