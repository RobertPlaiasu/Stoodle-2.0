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

    use FormTrait;
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
        $colleges = $this->getAllColleges();
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

        if($this->verifyMultipleInputs(
            $request->subject1,
            $request->subject2,
            $request->subject3
        ))return back()->with('error', "Materiile trebuie sa fie diferite");
        
        
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
        $college = College::findOrFail( $id );
        return view('facultatii.show', compact('college'));
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

    private function getAllColleges() :array
    {
        $colleges = College::all();
        $user = auth()->user();
        foreach($colleges as $college){
            $college->compability = $this->collegeCompability($user , $college);
            $collegesNew[] = $college;  
        }
        return $collegesNew;
    }

    //algorithm to calculate the compability for every college 
    private function collegeCompability ($user ,College $college) :int
    {
        

        $compabilitySum = 0;
        $compabilityMax = 105;

        $compabilitySum += $this->compareBoolean($user->job,$college->job);
        $compabilitySum += $this->compareBoolean($user->sport,$college->sport);
        $compabilitySum += $this->compareBoolean($user->social,$college->social);
        $compabilitySum += $this->compareBoolean($user->stress,$college->stress);

        $compabilitySum += $this->compareProfil($user->profil_id,$college->profil_id,
                                                $college->profil->profilType->pluck('id')->toArray(),
                                                $user->profil->profilType->pluck('id')->toArray());

        $compabilitySum += $this->comparePassion($college->passion_id,$user->passion_id,
                                                 $college->passion->passionType->pluck('id')->toArray(),
                                                 $user->passion->passionType->pluck('id')->toArray(),
                                                 $user->passion_intensity);

        $compabilitySum += $this->compareSubject($user->subject_id_1,$user->subject_id_2,
                                                 $user->subject_id_3,$college->subject_id_1,
                                                 $user->subject1->subjectType->pluck('id')->toArray(),
                                                 $user->subject2->subjectType->pluck('id')->toArray(),
                                                 $user->subject3->subjectType->pluck('id')->toArray(),
                                                 $college->subject1->subjectType->pluck('id')->toArray());
        $compabilitySum += $this->compareSubject($user->subject_id_1,$user->subject_id_2,
                                                 $user->subject_id_3,$college->subject_id_2,
                                                 $user->subject1->subjectType->pluck('id')->toArray(),
                                                 $user->subject2->subjectType->pluck('id')->toArray(),
                                                 $user->subject3->subjectType->pluck('id')->toArray(),
                                                 $college->subject2->subjectType->pluck('id')->toArray());
        $compabilitySum += $this->compareSubject($user->subject_id_1,$user->subject_id_2,
                                                 $user->subject_id_3,$college->subject_id_3,
                                                 $user->subject1->subjectType->pluck('id')->toArray(),
                                                 $user->subject2->subjectType->pluck('id')->toArray(),
                                                 $user->subject3->subjectType->pluck('id')->toArray(),
                                                 $college->subject3->subjectType->pluck('id')->toArray());

        $compabilitySum += $this->compareCounty($user->county_id,$college->county_id,
                                                $user->county->region->pluck('id')->toArray(),
                                                $college->county->region->pluck('id')->toArray());

        return floor(($compabilitySum/$compabilityMax) * 100);
        
    }

    //compare the values from the college with 0 and 1 stored in them
    private function compareBoolean($booleanUser , $booleanCollege) :int
    {

        if($booleanUser == $booleanCollege)
            return 5;
        return 0;
    } 

    /*search 2 elements in an array*/ 
    private function sameType($userTypes,$collegeTypes) :bool
    {
        foreach($userTypes as $userType)
        {
            if(in_array($userType,$collegeTypes))
                return true;
        }
        return false;
    }

    //
    private function sameTypeSubjects(array $userSubject1Type, array $userSubject2Type,
                                      array $userSubject3Type ,array $collegeSubjectType) :bool
    {
        if($this->sameType($userSubject1Type,$collegeSubjectType) ||
           $this->sameType($userSubject2Type,$collegeSubjectType) ||
           $this->sameType($userSubject3Type,$collegeSubjectType))
            return true;
        return false;
    }

    //compare the subject between college and user
    private function compareSubject(int $userSubject1, int $userSubject2, int $userSubject3,
                                    int $collegeSubject, array $userSubject1Type , array $userSubject2Type,
                                    array $userSubject3Type ,array $collegeSubjectType) :int
    {
        if($userSubject1 == $collegeSubject || $userSubject2 == $collegeSubject || 
           $userSubject3 == $collegeSubject)
            return 5;

        if($this->sameTypeSubjects($userSubject1Type,$userSubject2Type,
                                   $userSubject3Type,$collegeSubjectType))
            return 3;
        
        return 0;


    }

    //compare the passion between college and user
    private function comparePassion (int $collegePassion , int $userPassion , array $collegePassionTypes,
                                     array  $userPassionTypes , int $passionIntensity) :int
    {
        if($userPassion == $collegePassion) 
            return $passionIntensity * 10;

        if($this->sameType($userPassionTypes , $collegePassionTypes))
      
            return $passionIntensity * 5;
  
        return 0;

    }

    //compare the county between college and user
    private function compareCounty(int $userCounty, int $collegeCounty , array $userRegion,
                                   array $collegeRegion ) :int
    {
        if($userCounty == $collegeCounty) 
            return 10;


        if($this->sameType($userRegion , $collegeRegion)) 
            return 3;
        
        return 0;

    }

    //compare the profil between college and user
    private function compareProfil (int $collegeProfil , int $userProfil , array $collegeProfilTypes,
                                    array $userProfilTypes) :int
    {

        if($userProfil == $collegeProfil) 

            return 10;

        if($this->sameType($userProfilTypes , $collegeProfilTypes)) 

            return 5;

        return 0;

    }

    public function compareCollege($college1,$college2)
    {
        return $college1->compability < $college2->compability;
    }

}
