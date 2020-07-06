<?php

namespace App\Http\Controllers;

use App\Http\Controllers\FormController;
use App\User;


use Illuminate\Http\Request;

class InfoUserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function index()
    {
        return view('/form')
            ->with('data', FormController::index())
            ->with('text', FormController::generateUserFormText())
            ->with('for', 'user');
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

        if($this->verifyMultipleInputs($request->subject1,
                                    $request->subject2,
                                    $request->subject3))
            return back();

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


    private function verifyMultipleInputs(int $input1 , int $input2, int $input3)
    {
        if($input1 == $input2 ||
           $input1 == $input3 ||
           $input2 == $input3 )
           return true;
    }
}
