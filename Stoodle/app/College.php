<?php

namespace App;

use App\University;
use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    use CompabilityTrait;

    public $compability;
    

    protected $fillable = [
        'name','admittance','job','social',
        'stress','sport','university_id','county_id',
        'profil_id','passion_id','book_id','subject_id_1',
        'subject_id_2','subject_id_3','url','description'
    ];

    public function university()
    {

        return $this->belongsTo(University::class);

    }

}
