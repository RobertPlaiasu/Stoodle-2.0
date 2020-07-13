<?php

namespace App\Http\Controllers;

use App\ProfilType;
use Illuminate\Http\Request;

class ProfilTypeController extends Controller
{
    public function index()
    {
        $profilTypes = ProfilType::all();
        return view('profilType', [ 'profilTypes' => $profilTypes ] );
    }

    public function create()
    {
        return view('profilType.create');
    }

    public function store(Request $request)
    {

    }
}
