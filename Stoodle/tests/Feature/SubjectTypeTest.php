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

        $this->post('admin/subjectType',[
            'name' => 'New Type'
        ]);
        
        $this->assertCount(1,SubjectType::all());

    }

    /** @test */
    public function a_subject_type_can_be_updated()
    {
        $this->withoutExceptionHandling();

        $this->post('admin/subjectType',[
            'name' => 'Type'
        ]);

        $subjectType = SubjectType::first();

        $this->assertIsObject($subjectType);
        
        $this->patch('admin/subjectType/'.$subjectType->id,[
            'name' => 'New Type'
        ]);
        
        $this->assertEquals('New Type',SubjectType::first()->type);

    }
   


}
