<?php

namespace App\Http\Controllers;

use App\Http\Controllers\FormController;
use App\User;
use App\County;
use App\Passion;
use App\Book;
use App\Subject;
use App\Profil;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InfoUserController extends Controller
{
    use FormTrait;

    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function index()
    {
        $counties = County::all();
        $passions = Passion::all();
        $books = Book::all();
        $subjects = Subject::all();
        $profils = Profil::all();

        $data = [
            'counties' => $counties,
            'passions' => $passions,
            'books' => $books,
            'subjects' => $subjects,
            'profils' => $profils
        ];

        return view('/form')
            ->with('data', $data)
            ->with('text', FormController::generateUserFormText());
    }

    public function store(Request $request)
    {   
        $user = User::find(auth()->user()->id);

        $data =  $request->validate([
            'passion' => 'required|exists:passions,id',
            'passionIntensity' => 'required|max:1|regex:/^[1-5]+/',
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

        
        if ( $this->verifyMultipleInputs(
            $request->subject1,
            $request->subject2,
            $request->subject3
        )) return back()->with('error', "Materiile trebuie sa fie diferite");

        $user->passion_id = $request->passion;
        $user->passion_intensity = $request->passionIntensity;
        $user->profil_id = $request->profil;
        $user->stress = $request->stress;
        $user->job = $request->job;
        $user->book_id = $request->books;
        $user->county_id = $request->county;
        $user->social = $request->social;
        $user->sport = $request->sport;
        $user->subject_id_1 = $request->subject1;
        $user->subject_id_2 = $request->subject2;
        $user->subject_id_3 = $request->subject3;
        $user->save();
        
        
        return redirect('facultati');
    }

    public function myFavorites()
    {
        $myFavorites = Auth::user()->favorites;

        return view('favorites', compact('myFavorites'));
    }


}
