<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfilType extends Model
{
    public function profils()
    {

        return $this->belongsToMany(Profil::class);

    } 

}
