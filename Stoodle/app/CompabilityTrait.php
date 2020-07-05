<?php

namespace App;

trait CompabilityTrait
{

    public function book()
    {

        return $this->belongsTo(Book::class);

    }

    public function county()
    {

        return $this->belongsTo(County::class);

    }

    public function passion()
    {

        return $this->belongsTo(Passion::class);

    }

    public function profil()
    {

        return $this->belongsTo(Profil::class);

    }

    public function subject1()
    {

        return $this->belongsTo(Subject::class,'subject_id_1');

    }

    public function subject2()
    {

        return $this->belongsTo(Subject::class,'subject_id_2');

    }

    public function subject3()
    {

        return $this->belongsTo(Subject::class,'subject_id_3');

    }

}