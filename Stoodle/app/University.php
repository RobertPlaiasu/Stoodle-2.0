<?php

namespace App;

use Intervention\Image\Facades\Image;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    public function colleges()
    {

        return $this->hasMany(College::class);

    } 

    public function ifFileExists( $request, $university ) :void
    {
        if($request->hasFile('image'))
        {
            $university->image = $request->image->store('images','public');

            $image = Image::make(public_path('storage/'.$university->image))->fit(300,300);
            $image->save();
        }
    }
    
}
