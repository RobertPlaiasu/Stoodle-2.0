<?php

namespace App\Http\Controllers;

use App\County;
use App\Passion;
use App\Book;
use App\Subject;
use App\Profil;
use App\University;
use App\College;
use Illuminate\Http\Request;

class CollegeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct()
    {
        $this->middleware(['auth','verified','admin','checkForm'])->except('index','show');
        $this->middleware(['auth','verified','checkForm'])->only('index','show');
    }

    public function index()
    {
        $colleges = College::all();
        return view('facultatii.index')->with('colleges',$colleges);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $counties = County::all();
        $passion = Passion::all();
        $book = Book::all();
        $subject = Subject::all();
        $profil = Profil::all();
        $universities = University::all();
        return view('facultatii.create', [ 'counties' => $counties, 'passions' => $passion, 'universities' => $universities,
                                            'books' => $book, 'subjects' => $subject, 'profils' => $profil ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
