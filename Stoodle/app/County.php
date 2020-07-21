<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    use InteractionTrait;

    public function region()
    {

        return $this->belongsToMany(Region::class,'county_region','county_id','region_id');

    } 
}
