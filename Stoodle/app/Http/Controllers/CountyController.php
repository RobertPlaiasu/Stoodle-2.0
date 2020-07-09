<?php

namespace App\Http\Controllers;

use App\Region;
use App\County;
use Illuminate\Http\Request;

class CountyController extends Controller
{
    public function index(){
        $counties = County::all();
        return view('county', [ 'counties' => $counties ] );
    }

    public function create()
    {
        $regions = Region::all();
        return view('county.create',['regions' => $regions]);
    }

    public function store(Request $request)
    {

    }
}
