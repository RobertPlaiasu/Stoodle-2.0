<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoUser extends Model
{
    protected $fillable = [
        'job' , 'social','profil_id' , 'passion_id',
        'stress' , 'sport' , 'county_id' ,
        'book_id'
    ];


    public function book()
    {

        return $this->belongsTo(Book::class);

    }

    public function county()
    {

        return $this->belongsTo(County::class);

    }

    public function passion()
    {

        return $this->belongsTo(Passion::class);

    }

    public function profil()
    {

        return $this->belongsTo(Profil::class);

    }

    public function subjects()
    {

        return $this->belongsToMany(Subject::class);

    }
}
