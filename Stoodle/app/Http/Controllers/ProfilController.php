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
        $profil->profilTypes()->sync( $request->type );
        $profil->save();
        
        return redirect('admin/profil');
    }

    public function edit( $id )
    {
        $item = Profil::findOrFail( $id );
        $text = 'profil';
        return view('admin.edit', compact( 'item', 'text' ));
    }

    public function update(Request $request,$id )
    {
        $request->validate([
            'name' => 'required'
        ]);
        
        $item = Profil::findOrFail( $id ); 
        $item->name = $request->name;
        $item->timestamps = false;
        $item->save();
        
        return redirect('admin/profil/');
    }

    public function destroy( $id )
    {
        $item = Profil::findOrFail( $id ); 
        $item->delete();
        return redirect('/admin/profil');
    }
}
