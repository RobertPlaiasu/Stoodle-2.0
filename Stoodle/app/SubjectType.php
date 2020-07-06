<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubjectType extends Model
{
    public function subject()
    {

        return $this->belongsToMany(Subject::class);

    } 
}
