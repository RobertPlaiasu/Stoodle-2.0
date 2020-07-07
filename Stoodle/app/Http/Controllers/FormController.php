<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{

    public static function generateUserFormText ()
    {
        return [
            'De ce esti pasionat?',
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
