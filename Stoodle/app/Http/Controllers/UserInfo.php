<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UserInfo extends Controller
{
    public function searchFormCompleted($mail)
    {

        $job = DB::table('users')->where('email')->pluck('job');
        return $job;

    }
}
