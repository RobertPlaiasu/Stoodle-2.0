<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class AdminPanelPageTest extends TestCase
{
    public function test_user_can_view_admin_panel_when_is_admin()
    {
        $user = $this->generateAdminUser();

        $response = $this->actingAs($user)->get('/admin');
        
        $response
            ->assertSuccessful()
            //* Checkif navbar loads correctly
            ->assertSee( $user->name )
            ->assertSee("Admin Panel");
    }

    public function test_user_cannot_view_admin_panel_when_is_not_admin()
    {
        $user = $this->generateUser();

        $response = $this->actingAs($user)->get('/admin');
        
        $response->assertRedirect('/');
    }
    
    private function generateUser()
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

    private function generateAdminUser()
    {
        return factory(User::class)->make(
            [
                'admin' => 1,
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
