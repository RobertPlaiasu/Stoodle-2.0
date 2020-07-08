<?php

namespace App\Http\Controllers;

use App\Http\Controllers\FormController;
use App\College;
use App\County;
use App\Passion;
use App\Book;
use App\Subject;
use App\Profil;
use App\University;

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
        // $this->middleware(['auth','verified','admin','checkForm'])->except('index','show');
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
        $passions = Passion::all();
        $books = Book::all();
        $subjects = Subject::all();
        $profils = Profil::all();
        $universities = University::all();

        $data  = [
            'counties' => $counties,
            'passions' => $passions,
            'books' => $books,
            'subjects' => $subjects,
            'profils' => $profils,
            'universities' => $universities
        ]; 

        return view('facultatii.create')
            ->with('data', $data)
            ->with('text', FormController::generateCollegeFormText());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:colleges,name|max:100|min:7',
            'university' => 'required|exists:universities,id',
            'url' => 'required|url',
            'description' => 'required|min:200|max:30000',
            'admittance' => 'required|boolean',
            'passion' => 'required|exists:passions,id',
            'subject1' => 'required|exists:subjects,id',
            'subject2' => 'required|exists:subjects,id',
            'subject3' => 'required|exists:subjects,id',
            'profil' => 'required|exists:profils,id',
            'stress' => 'required|boolean',
            'job' => 'required|boolean',
            'books' => 'required|exists:books,id',
            'county' => 'required|exists:counties,id',
            'social' => 'required|boolean',
            'sport' => 'required|boolean'
        ]);
        
        $college = new College;
        $college->name = $request->name;
        $college->university_id = $request->university;
        $college->description =  $request->description;
        $college->url = $request->url;
        $college->admittance = $request->admittance;
        $college->passion_id = $request->passion;
        $college->subject_id_1 = $request->subject1;
        $college->subject_id_2 = $request->subject2;
        $college->subject_id_3 = $request->subject3;
        $college->profil_id = $request->profil;
        $college->stress = $request->stress;
        $college->job = $request->job;
        $college->book_id = $request->books;
        $college->county_id = $request->county;
        $college->social = $request->social;
        $college->sport = $request->sport;
        $college->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $college = College::findOrFail( $id );
        return view('facultatii.show', compact('college'));
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
