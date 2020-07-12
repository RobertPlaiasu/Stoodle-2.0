<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use InteractionTrait;

    public function profilType()
    {

        return $this->belongsToMany(ProfilType::class);

    } 

}
