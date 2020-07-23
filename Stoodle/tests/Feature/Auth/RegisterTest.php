<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_view_a_register_form()
    {
        $response = $this->get('/register');

        $response
            ->assertSuccessful()
            //* Checkif navbar loads correctly
            ->assertSee('autentificare')
            ->assertViewIs('auth.register');
    }

    public function test_user_cannot_view_a_register_form_when_authenticated()
    {
        $user = factory(User::class)->make();

        $response = $this->actingAs($user)->get('/register');

        $response->assertRedirect('/facultati');
    }

    public function a_user_can_register_with_correct_credentials()
    {
        $response = $this->post('/register', [
            'name' => 'Joe',
            'email' => 'testemail@test.com',
            'password' => 'passwordtest',
            'password_confirmation' => 'passwordtest'
        ]);

        $response
            ->assertSuccessful()
            ->assertRedirect('/facultati');
    }

    public function test_user_cannot_register_with_incorrect_password()
    {
        $user = factory(User::class)->create([
            'password' => bcrypt('i-love-laravel'),
        ]);
        
        $response = $this->from('/register')->post('/login',[
            'name' => 'Joe',
            'email' => 'testemail@test.com',
            'password' => 'passwordtest',
            'password_confirmation' => 'invalid-confirmation'
        ]);
        
        $response
            ->assertRedirect('/register')
            ->assertSessionHasErrors('email');

        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }
}
