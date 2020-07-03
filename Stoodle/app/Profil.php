<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    public function colleges()
    {

        return $this->hasMany(College::class);

    }

    public function users()
    {

        return $this->hasMany(InfoUser::class);

    }

}
