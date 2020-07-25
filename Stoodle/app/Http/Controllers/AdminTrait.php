<?php

namespace App\Http\Controllers;


trait AdminTrait
{

    private function saveData($data,$request)
    {
        $data->name = $request->name;
        $data->timestamps = false;
        $data->save();
    }

    private function saveType($data,$request)
    {
        $data->type = $request->name;
        $data->timestamps = false;
        $data->save();
    }

}