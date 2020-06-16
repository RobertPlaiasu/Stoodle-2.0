<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public function college()
    {

        return $this->belongsToMany(College::class);

    }

    public function user()
    {

        return $this->belongsToMany(User::class);

    }
}
