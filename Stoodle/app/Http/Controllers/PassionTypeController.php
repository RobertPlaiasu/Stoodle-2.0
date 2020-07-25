<?php

namespace App\Http\Controllers;


use App\PassionType;

use Illuminate\Http\Request;
use App\CustomClass\PanelText;
use App\User;

class PassionTypeController extends Controller
{
    use AdminTrait;

    private $text;
    private $hasType; 
    
    public function __construct()
    {
        $this->hasType = false;
        $this->text = new PanelText( 'tipuri de pasiuni', 'tip pasiune', 'passionType' );
        $this->middleware( ['auth', 'verified', 'admin'] );    
    }

    public function index()
    {
        return view( 'admin.show' )
            ->with( 'data', PassionType::all() )
            ->with( 'text', $this->text );
    }

    public function create()
    {
        return view('admin.create')
            ->with( 'data', PassionType::all() )
            ->with( 'text', $this->text )
            ->with( 'hasType', $this->hasType );
    }

    public function store( Request $request )
    {
        $request->validate([
            'nume' => 'required|unique:passion_types,type|max:255'
        ]);

        $passionType = new PassionType;
        $this->saveType( $passionType, $request );
        
        return redirect( 'admin/passionType' );
    }

    public function edit( PassionType $passionType )
    {
        return view( 'admin.edit' )
            ->with( 'item', $passionType )
            ->with( 'text', $this->text )
            ->with( 'hasType', $this->hasType );
    }

    public function update( Request $request, PassionType $passionType )
    {
        $request->validate([
            'nume' => 'required|max:255'
        ]);
        
        $this->saveType( $passionType, $request );
        
        return redirect( 'admin/passionType' );
    }

    public function destroy( PassionType $passionType )
    {
        $passionType->delete();
        return redirect()->back();
    }
}
