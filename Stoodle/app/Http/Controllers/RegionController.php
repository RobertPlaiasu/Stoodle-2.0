<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function index()
    {
        $region = Region::all();
        return view('region', [ 'region' => $region ] );
    }

    public function create()
    {
        return view('region.create');
    }

    public function store(Request $request)
    {

    }
}
