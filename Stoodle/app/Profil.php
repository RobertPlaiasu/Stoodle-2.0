<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use InteractionTrait;

    protected $guarded = [];

    public function profilType()
    {

        return $this->belongsToMany(ProfilType::class);

    } 

}
