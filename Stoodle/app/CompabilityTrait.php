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

    public function subjects()
    {

        return $this->belongsToMany(Subject::class);

    }

}