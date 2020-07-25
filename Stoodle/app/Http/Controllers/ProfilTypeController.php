<?php

namespace App\Http\Controllers;

use App\ProfilType;
use App\User;
use Illuminate\Http\Request;

class ProfilTypeController extends Controller
{
    use AdminTrait;

    private $text = 'profilType';
    private $hasType = false; 
    
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'admin']);   
    }

    public function index()
    {
        return view('admin.show')->with('data',ProfilType::all())
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
            'name' => 'required|max:255|unique:profil_types,type'
        ]);

        $profilType = new ProfilType;
        $this->saveType($profilType,$request);
        
        return redirect('admin/profilType');
    }

    public function edit( ProfilType $profilType )
    {
        return view('admin.edit')->with('item',$profilType)
                                 ->with('text',$this->text)
                                 ->with('hasType',$this->hasType);
    }

    public function update(Request $request, ProfilType $profilType )
    {
        $request->validate([
            'name' => 'required|max:255'
        ]);
        
        $this->saveType($profilType,$request);

        return redirect('admin/profilType');
    }

    public function destroy( ProfilType $profilType )
    {
        $profilType->delete();
        return redirect()->back();

    }
}
