<?php

namespace App\Http\Controllers;

use App\Passion;
use App\PassionType;
use Illuminate\Http\Request;

class PassionController extends Controller
{
    public function index(){
        $passions = Passion::all();
        return view('passion', [ 'passions' => $passions ] );
    }

    public function create()
    {
        $passionTypes = PassionType::all();
        return view('passion.create',['passionTypes' => $passionTypes]);
    }

    public function store(Request $request)
    {

    }
}
