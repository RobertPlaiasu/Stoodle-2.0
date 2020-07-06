<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use InteractionTrait;

    public function passion()
    {

        return $this->belongsToMany(PassionType::class);

    } 

}
