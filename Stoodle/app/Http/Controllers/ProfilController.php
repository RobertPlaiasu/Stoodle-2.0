<?php

namespace App\Http\Controllers;

use App\Profil;
use App\ProfilType;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index(){
        $profils = Profil::all();
        return view('profil', [ 'profils' => $profils ] );
    }

    public function create()
    {
        $profilTypes = ProfilType::all();
        return view('profil.create',['profilTypes' => $profilTypes]);
    }

    public function store(Request $request)
    {

    }
}
