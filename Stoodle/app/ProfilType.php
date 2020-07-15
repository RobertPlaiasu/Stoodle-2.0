<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfilType extends Model
{
    public function profil()
    {

        return $this->belongsToMany(Profil::class);

    } 

}
