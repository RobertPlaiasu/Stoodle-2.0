<?php

namespace App\Http\Controllers;

use App\University;
use App\User;
use Illuminate\Http\Request;

class UniversityController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'admin', 'checkForm']);    
    }

    public function index()
    {
        $data = University::all();
        $text = 'university';
        return view('admin.show', compact( 'data', 'text' ));
    }

    public function create()
    {
        $data = NULL;
        $text = 'university';
        $hasType = false;
        return view('admin.create', compact( 'data', 'text', 'hasType' ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $university = new University;
        $university->name = $request->name;
        $university->timestamps = false;
        $university->save();
        
        return redirect('admin/university');
    }

    public function edit( University $university )
    {
        $item = $university;
        $text = 'university';
        return view('admin.edit', compact( 'item', 'text' ));
    }

    public function update(Request $request, University $university )
    {
        $request->validate([
            'name' => 'required'
        ]);
        
        $university->name = $request->name;
        $university->timestamps = false;
        $university->save();
        
        return redirect('admin/university/');
    }

    public function destroy( University $university )
    {
        $university->delete();
        return redirect('/admin/university');
    }
}
