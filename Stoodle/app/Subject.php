<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public function colleges1()
    {

        return $this->hasMany(College::class,'subject_id_1');

    }

    public function colleges2()
    {

        return $this->hasMany(College::class,'subject_id_2');

    }

    public function colleges3()
    {

        return $this->hasMany(College::class,'subject_id_3');

    }

    public function users1()
    {

        return $this->hasMany(User::class,'subject_id_1');

    }

    public function users2()
    {

        return $this->hasMany(User::class,'subject_id_2');

    }

    public function users3()
    {

        return $this->hasMany(User::class,'subject_id_3');

    }

    public function subjectTypes()
    {

        return $this->belongsToMany(SubjectType::class);

    }

}
