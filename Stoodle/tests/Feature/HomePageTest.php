<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\College;

class HomePageTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_home_page_loads_correctly()
    {
        $user = $this->generateUser();

        $response = $this->actingAs($user)->get('/facultati');
        
        $response
            ->assertSuccessful()
            //* Checkif navbar loads correctly
            ->assertSee( $user->name )
            ->assertSee("Acasa");
    }

    public function test_user_can_view_the_app_if_authentificated_and_has_completed_the_form()
    {
        $user = $this->generateUser();

        $response = $this->actingAs($user)->get('/facultati');

        $response->assertSuccessful();
    }

    public function test_all_colleges_are_visible()
    {
        $this->artisan('db:seed');
        $college = factory( College::class )->create();

        $user = $this->generateUser();

        $response = $this->actingAs($user)->get('/facultati');

        $response
            ->assertSuccessful()
            ->assertSee( $college->name );

    }

    public function generateUser()
    {
        return factory(User::class)->make(
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
    }
}
