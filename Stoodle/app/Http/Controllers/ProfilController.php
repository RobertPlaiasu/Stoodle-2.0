<?php

namespace App\Http\Controllers;

use App\Profil;
use App\ProfilType;
use App\User;
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
        $data = ProfilType::all();
        $text = 'profil';
        $hasType = true;
        return view('admin.create', compact( 'data', 'text', 'hasType' ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required'
        ]);

        $profil = new Profil;
        $profil->name = $request->name;
        $profil->timestamps = false;
        $profil->save();
        $profil->profilType()->sync( $request->type );
        $profil->save();
        
        return redirect('admin/profil');
    }

    public function edit( Profil $profil )
    {
        $item = $profil;
        $text = 'profil';
        return view('admin.edit', compact( 'item', 'text' ));
    }

    public function update(Request $request, Profil $profil )
    {
        $request->validate([
            'name' => 'required'
        ]);
        
        $profil->name = $request->name;
        $profil->timestamps = false;
        $profil->save();
        
        return redirect('admin/profil/');
    }

    public function destroy( Profil $profil )
    {
        $profil->delete();
        return redirect('/admin/profil');
    }
}
