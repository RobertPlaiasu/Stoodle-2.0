<?php

namespace App\Http\Controllers;

use App\PassionType;
use Illuminate\Http\Request;

class PassionTypeController extends Controller
{
    public function index()
    {
        $passions = PassionType::all();
        return view('passionType', [ 'passionTypes' => $passionTypes ] );
    }

    public function create()
    {
        return view('passionType.create');
    }

    public function store(Request $request)
    {

    }
}
