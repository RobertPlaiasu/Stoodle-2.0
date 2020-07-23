<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class ContactPageTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_contact_page_loads_corectlly()
    {
        $user = factory(User::class)->make(
            [
                'job' => '1',
                'passion_intensity' => '1',
                'social' => '0',
                'stress' => '1',
                'sport' => '1',
                'county_id' => '1',
                'profil_id' => '5',
                'passion_id' => '26',
                'book_id' => '3',
                'subject_id_1' => '20',
                'subject_id_2' => '5',
                'subject_id_3' => '9',
            ]
        );

        $response = $this->actingAs($user)->get('/facultati');
        
        $response
            ->assertSuccessful()
            ->assertSee("Contact");
    }
}
