<?php

namespace App\Http\Controllers;

use App\University;
use Illuminate\Http\Request;

class UniversityController extends Controller
{
    public function index()
    {
        $universities = University::all();
        return view('university', [ 'universities' => $universities ] );
    }

    public function create()
    {
        return view('university.create');
    }

    public function store(Request $request)
    {

    }
}
