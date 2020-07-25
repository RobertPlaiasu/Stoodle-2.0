<?php

namespace App\Http\Controllers;

use App\Profil;
use App\ProfilType;
use App\User;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    use AdminTrait;

    private $text = 'profil';
    private $hasType = true;

    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'admin']);   
    }

    public function index()
    {
        return view('admin.show')->with('data',Profil::all())
                                 ->with('text',$this->text);
    }

    public function create()
    {
        return view('admin.create')->with('data',ProfilType::all())
                                    ->with('text',$this->text)
                                    ->with('hasType',$this->hasType);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|unique:profils,name',
            'type' => 'required|exists:profil_types,id'
        ]);

        $profil = new Profil;
        $this->saveProfil($profil,$request);
        
        return redirect('admin/profil');
    }

    public function edit( Profil $profil )
    {
        return view('admin.edit')->with('typeSelected',$profil->profilType()->pluck('profil_type_id')->toArray())
                                ->with('item',$profil)
                                ->with('data',ProfilType::all())
                                ->with('hasType',$this->hasType)
                                ->with('text',$this->text);
    }

    public function update(Request $request, Profil $profil )
    {
        $request->validate([
            'name' => 'required|max:255',
            'type' => 'required|exists:profils,id'
        ]);
        
        $this->saveProfil($profil,$request);
        return redirect('admin/profil');
    }

    public function destroy( Profil $profil )
    {
        $profil->delete();
        return redirect('/admin/profil');
    }

    private function saveProfil($profil,$request)
    {
        $this->saveData($profil,$request);
        $profil->profilType()->sync( $request->type );
        $profil->save();
    }
}
