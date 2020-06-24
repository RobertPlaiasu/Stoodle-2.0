<?php

namespace App\Http\Controllers;

use App\County;
use Illuminate\Http\Request;

class CountyController extends Controller
{
    public function index(){
        $counties = County::all();
        return view('admin', [ 'counties' => $counties ] );
    }
}
