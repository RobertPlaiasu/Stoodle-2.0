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
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class CollegeController extends Controller
{
    use Sort,FormTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct()
    {
        $this->middleware( [ 'auth', 'verified', 'checkForm' ])->only('index','show');
        $this->middleware( [ 'auth', 'verified', 'checkForm','admin'] )->except('index','show');    
    }

    public function index()
    {
        $colleges = $this->getAllColleges(College::all());
        usort($colleges, array($this , "compareCollege") );
        return view('facultatii.index')->with('colleges',$colleges);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {      
        //* Get all the data needed from the databse
        $counties = County::all();
        $passions = Passion::all();
        $books = Book::all();
        $subjects = Subject::all();
        $profils = Profil::all();
        $universities = University::all();

        //* Create an array with all the data from databse
        $data  = [
            'counties' => $counties,
            'passions' => $passions,
            'books' => $books,
            'subjects' => $subjects,
            'profils' => $profils,
            'universities' => $universities
        ]; 

        //* Display facultatii/create page with data and text needed as arguments
        return view('facultatii.create')
            ->with('data', $data)
            ->with('text', $this->generateFormText());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateUpdateOrCreate($request);

        //* Check if all the subjects selected ar diferrent
        if($this->verifyMultipleInputs(
            $request->subject1,
            $request->subject2,
            $request->subject3
        ))
        return back()->with('error', "Materiile trebuie sa fie diferite");
        
        //* If all the data is validated create a new college
        $college = new College;
        $this->updateOrCreateCollege($request,$college);

        return redirect('facultati'); 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //* Get the college form the databse based on id
        //! If the college doesn't exist return 404
        $college = College::findOrFail( $id );
        $user = auth()->user();
        $college->compability = $this->collegeCompability($user,$college);
        //* Display facultatii/show page with the found college as argument
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
        //* Get the college form the databse based on id
        //! If the college doesn't exist return 404
        $college = College::findOrFail( $id );

        //* Get all the data from the database
        $counties = County::all();
        $passions = Passion::all();
        $books = Book::all();
        $subjects = Subject::all();
        $profils = Profil::all();
        $universities = University::all();

        //* Create an array with all the data from datab
        $data  = [
            'counties' => $counties,
            'passions' => $passions,
            'books' => $books,
            'subjects' => $subjects,
            'profils' => $profils,
            'universities' => $universities
        ]; 

        //* Display facultatii/edit page with the found college, data from the database and the needed text as arguments
        return view('facultatii.edit', compact('college'))
            ->with('data', $data)
            ->with('text', $this->generateFormText());
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
        //* Get the college form the databse based on id
        //! If the college doesn't exist return 404
        $college = College::findOrFail( $id );

        $this->validateUpdateOrCreate($request);        
        //* Check if all the subjects selected ar diferrent
        if($this->verifyMultipleInputs(
            $request->subject1,
            $request->subject2,
            $request->subject3
        ))
        return back()->with('error', "Materiile trebuie sa fie diferite");

        $this->updateOrCreateCollege($request,$college);

        return redirect('facultati');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(College $college)
    {
        $college->delete();
        redirect('/facultati');
    }

    private function updateOrCreateCollege($request,$college) : void 
    {

        $college->name = $request->name;
        $college->university_id = $request->university;
        $college->description =  $request->description;
        $this->ifFileExists($request,$college);
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

    private function validateUpdateOrCreate($request) : void
    {
        $request->validate([
            'name' => 'required|max:255|min:7',
            'image' => 'sometimes|file|image|mimes:jpeg,png,jpg|max:1999',
            'university' => 'required|exists:universities,id',
            'url' => 'required|url|max:255',
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
    }

    private function ifFileExists($request,$college) :void
    {
        if($request->hasFile('image'))
        {
            $college->image = $request->image->store('images','public');

            $image = Image::make(public_path('storage/'.$college->image))->fit(300,300);
            $image->save();
        }
    }

    private function generateFormText() :array
    {
        return [
            'Pasiunea ce se potriveste facultatii',
            'Materii ce se potrivesc facultatii',
            'Profilul ideal',
            'Trebuie ca elevul sa faca fata situatiilor stresante?',
            'Isi permite un elev mediocru sa aiba un job part-time?',
            'Ce tip de carti trebuie sa citeasca elevul ideal?',
            'Judetul in care se afla facultatea',
            'Trebuie ca elevul sa comunice frecvent?',
            'Trebuie ca elevul ideal sa practice un sport in timpul liber?',
        ];
    }

}
