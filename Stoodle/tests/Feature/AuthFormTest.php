<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class AuthFormTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_form_loads_correctly()
    {
        //* Arrange
        $user = factory(User::class)->make();

        //* Act
        $response = $this->actingAs($user)->get('/form');

        //* Assert
        $response
            ->assertSuccessful()
            ->assertSee("Bun venit in familia Stoodle!");
    }

    public function test_user_cannot_view_the_app_if_authentificated_and_has_not_completed_the_form()
    {
        //* Arrange
        $user = factory(User::class)->make();

        //* Act
        $response = $this->actingAs($user)->get('/facultati');

        //* Assert
        $response->assertRedirect('/form');
    }   
}
