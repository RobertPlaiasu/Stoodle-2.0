<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    public function colleges()
    {

        return $this->hasMany(College::class);

    } 

    
    
}
