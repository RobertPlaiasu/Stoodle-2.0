<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoUser extends Model
{
    use CompabilityTrait;

    protected $fillable = [
        'job' , 'social','profil_id' , 'passion_id',
        'stress' , 'sport' , 'county_id' ,
        'book_id'
    ];



    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
