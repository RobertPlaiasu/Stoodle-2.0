<?php

namespace App\Http\Controllers;

trait FormTrait
{
    private function verifyMultipleInputs(int $input1 , int $input2, int $input3)
    {
        //tODO: 3= TEST
        return ($input1 == $input2 || $input1 == $input3 || $input2 == $input3);
    }

}