<?php

namespace App\Http\Controllers;

use App\Profil;
use App\ProfilType;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'admin', 'checkForm']);
    }

    public function index()
{
        $data = Profil::all();
        $text = 'profil';
        return view('admin.show', compact( 'data', 'text' ));
    }

    public function create()
    {
        $profilTypes = ProfilType::all();
        return view('admin.profil.create',['profilTypes' => $profilTypes]);
    }

    public function store(Request $request)
    {

    }

public function destroy( Profil $profil )
    {
        $profil->delete();
        return redirect('/admin/profil');
    }
}
