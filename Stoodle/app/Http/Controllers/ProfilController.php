<?php

namespace App\Http\Controllers;

use App\Profil;
use App\ProfilType;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index(){
        $profils = Profil::all();
        return view('admin.profil.index', [ 'profils' => $profils ] );
    }

    public function create()
    {
        $profilTypes = ProfilType::all();
        return view('admin.profil.create',['profilTypes' => $profilTypes]);
    }

    public function store(Request $request)
    {

    }
}
