<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mockery\Generator\StringManipulation\Pass\Pass;

class PassionType extends Model
{
    public function passion()
    {

        return $this->belongsToMany(Passion::class);

    } 
}
