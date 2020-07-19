<?php

namespace App\Http\Controllers;

use App\ProfilType;
use App\User;
use Illuminate\Http\Request;

class ProfilTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'admin', 'checkForm']);   
    }

    public function index()
    {
        $data = ProfilType::all();
        $text = 'profilType';
        return view('admin.show', compact( 'data', 'text' ));

    }

    public function create()
    {
        $data = ProfilType::all();
        $text = 'profilType';
        $hasType = false;
        return view('admin.create', compact( 'data', 'text', 'hasType' ));

    }
  
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required'
        ]);

        $profil = new ProfilType;
        $profil->type = $request->name;
        $profil->timestamps = false;
        $profil->save();
        
        return redirect()->back();
    }

    public function edit( ProfilType $profilType )
    {
        $item = $profilType;
        $text = 'profilType';
        return view('admin.edit', compact( 'item', 'text' ));
    }

    public function update(Request $request, ProfilType $profilType )
    {
        $request->validate([
            'name' => 'required'
        ]);
        
        $profilType->type = $request->name;
        $profilType->timestamps = false;
        $profilType->save();
        
        return redirect('admin/profilType/');
    }

    public function destroy( ProfilType $profilType )
    {
        $profilType->delete();
        return redirect()->back();

    }
}
