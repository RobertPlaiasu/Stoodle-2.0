<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    public function colleges()
    {

        return $this->hasMany(College::class);

    }

    public function users()
    {

        return $this->hasMany(User::class);

    }

}
