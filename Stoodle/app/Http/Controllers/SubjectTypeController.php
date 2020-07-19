<?php

namespace App\Http\Controllers;

use App\SubjectType;
use App\User;
use Illuminate\Http\Request;

class SubjectTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'admin', 'checkForm']);
    }

    public function index()
    {
        $data = SubjectType::all();
        $text = 'subjectType';
        return view('admin.show', compact( 'data', 'text' ));

    }

    public function create()
    {
        $data = SubjectType::all();
        $text = 'subjectType';
        $hasType = false;
        return view('admin.create', compact( 'data', 'text', 'hasType' ));

    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $profil = new SubjectType;
        $profil->type = $request->name;
        $profil->timestamps = false;
        $profil->save();
        
        return redirect()->back();
    }

    public function edit( SubjectType $subjectType )
    {
        $item = $subjectType;
        $text = 'subjectType';
        return view('admin.edit', compact( 'item', 'text' ));
    }

    public function update(Request $request, SubjectType $subjectType )
    {
        $request->validate([
            'name' => 'required'
        ]);
        
        $subjectType->type = $request->name;
        $subjectType->timestamps = false;
        $subjectType->save();
        
        return redirect('admin/subjectType/');
    }

    public function destroy( SubjectType $subjectType )
    {
        $subjectType->delete();
        return redirect()->back();

    }
}
