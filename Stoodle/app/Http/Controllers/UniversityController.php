<?php

namespace App\Http\Controllers;

use App\University;
use App\User;
use Illuminate\Http\Request;

class UniversityController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'admin']);    
    }

    public function index()
    {
        $data = University::all();
        $text = 'university';
        return view('admin.show', compact( 'data', 'text' ));
    }

    public function create()
    {
        $text = 'university';
        $hasType = false;
        return view('admin.create', compact( 'text', 'hasType' ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|unique:universities,name'
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
        $hasType = false;
        return view('admin.edit', compact( 'item', 'text','hasType' ));
    }

    public function update(Request $request, University $university )
    {
        $request->validate([
            'name' => 'required|max:255'
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
