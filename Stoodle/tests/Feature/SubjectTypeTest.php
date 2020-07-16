<?php

namespace Tests\Feature;

use App\SubjectType;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SubjectTypeTest extends TestCase
{
    use RefreshDatabase,WithoutMiddleware;
    /** @test */
    public function a_subject_type_can_be_added()
    {
        $this->withoutExceptionHandling();

        $this->post('subjectType',[
            'type' => 'New Type'
        ]);
        
        $this->assertCount(1,SubjectType::all());

    }
}
