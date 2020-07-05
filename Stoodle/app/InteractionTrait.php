<?php

namespace App;

trait InteractionTrait
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