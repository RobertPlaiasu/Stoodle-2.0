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
        $this->middleware(['auth', 'verified', 'admin']);   
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
            'name' => 'required|max:255|unique:profils,name',
            'type' => 'required|exists:profil_types,id'
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
        $hasType = true;
        $data = ProfilType::all();
        $typeSelected = $profil->profilType()->pluck('profil_type_id')->toArray();
        return view('admin.edit', compact( 'item', 'text','hasType','data','typeSelected'));
    }

    public function update(Request $request, Profil $profil )
    {
        $request->validate([
            'name' => 'required|max:255',
            'type' => 'required|exists:profils,id'
        ]);
        
        $profil->name = $request->name;
        $profil->timestamps = false;
        $profil->save();
        $profil->profilType()->sync( $request->type );
        $profil->save();
        
        return redirect('admin/profil');
    }

    public function destroy( Profil $profil )
    {
        $profil->delete();
        return redirect('/admin/profil');
    }
}
