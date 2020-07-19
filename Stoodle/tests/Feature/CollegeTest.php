<?php

namespace Tests\Feature;

use App\College;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class CollegeTest extends TestCase
{
    use RefreshDatabase,WithoutMiddleware;
    /**@test */
    public function a_college_can_be_added()
    {
        $this->withoutExceptionHandling();

        $this->post('/facultati', 
        [

        ]);
    }
}
