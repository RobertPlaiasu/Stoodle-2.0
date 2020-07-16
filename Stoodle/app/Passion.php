<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passion extends Model
{
    use InteractionTrait;

    public function passionTypes()
    {

        return $this->belongsToMany(PassionType::class);

    }
}
