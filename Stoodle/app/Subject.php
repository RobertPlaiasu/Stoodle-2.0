<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{


    protected $guard = [ ];

    public function college()
    {

        return $this->belongsToMany(College::class);

    }

    public function user()
    {

        return $this->belongsToMany(InfoUser::class);

    }
}
