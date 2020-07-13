<?php

namespace App\Http\Controllers;

use App\Profil;
use App\ProfilType;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public $text = 'profil';

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
        $data = ProfilType::all();
        $text = 'profil';
        return view('admin.create', compact( 'data', 'text' ));
    }

    public function store(Request $request)
    {

    }

    public function destroy( $id )
    {
        $profil = Profil::find( $id );
        $profil->delete();
        return redirect('/admin/profil');
    }
}
