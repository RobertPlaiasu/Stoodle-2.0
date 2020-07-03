<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    use CompabilityTrait;
    

    public function university()
    {

        return $this->belongsTo(University::class);

    }

}
