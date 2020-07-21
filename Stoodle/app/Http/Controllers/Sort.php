<?php

namespace App\Http\Controllers;

trait Sort 
{

    private function getAllColleges($colleges) :array
    {
        $user = auth()->user();
        $collegesNew = [];
        if( count( $colleges ) )
            foreach($colleges as $college){
                $college->compability = $this->collegeCompability($user , $college);
                $collegesNew[] = $college;  
            }
        return $collegesNew;
    }

    //algorithm to calculate the compability for every college 
    private function collegeCompability ($user , $college) :int
    {
        

        $compabilitySum = 0;
        $compabilityMax = 110;

        $college->load('profil.profilType');
        $user->load('profil.profilType');
        
        $college->load('passion.passionType');
        $user->load('passion.passionType');

        $user->load('subject1.subjectType');
        $user->load('subject2.subjectType');
        $user->load('subject3.subjectType');
        $college->load('subject1.subjectType');
        $college->load('subject2.subjectType');
        $college->load('subject3.subjectType');

        $user->load('county.region');
        $college->load('county.region');

        $compabilitySum += $this->compareBoolean($user->job,$college->job);
        $compabilitySum += $this->compareBoolean($user->sport,$college->sport);
        $compabilitySum += $this->compareBoolean($user->social,$college->social);
        $compabilitySum += $this->compareBoolean($user->stress,$college->stress);

        $compabilitySum += $this->compareBook($user->book_id,$college->book_id);

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

    //compare books between user and college
    private function compareBook(int $userBook,int $collegeBook) :int
    {
        if($userBook == $collegeBook)
            return 5;
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

    private function compareCollege($college1,$college2)
    {
        return $college1->compability < $college2->compability;
    }

}