<?php

namespace App\Http\Controllers;


use App\PassionType;

use Illuminate\Http\Request;
use App\User;

class PassionTypeController extends Controller
{
    //TODO: variables for class | One class ? 
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'admin']);    
    }

    public function index()
    {
        $data = PassionType::all();
        $text = 'passionType';
        return view('admin.show', compact( 'data', 'text' ));
    }

    public function create()
    {
        $data = PassionType::all();
        $text = 'passionType';
        $hasType = false;
        return view('admin.create', compact( 'data', 'text', 'hasType' ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:passion_types,type|max:255'
        ]);

        $passionType = new PassionType;
        $passionType->type = $request->name;
        $passionType->timestamps = false;
        $passionType->save();
        
        return redirect()->back();
    }

    public function edit( PassionType $passionType )
    {
        $item = $passionType;
        $text = 'passionType';
        $hasType = false;
        return view('admin.edit', compact( 'item', 'text','hasType'));
    }

    public function update(Request $request, PassionType $passionType )
    {
        $request->validate([
            'name' => 'required|max:255'
        ]);
        
        $passionType->type = $request->name;
        $passionType->timestamps = false;
        $passionType->save();
        
        return redirect('admin/passionType');
    }

    public function destroy( PassionType $passionType )
    {
        $passionType->delete();
        return redirect()->back();

    }
}
