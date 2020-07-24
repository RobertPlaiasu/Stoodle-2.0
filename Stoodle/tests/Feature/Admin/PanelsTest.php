<?php

namespace Tests\Feature\Admin;

use App\Passion;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\User;
use Illuminate\Support\Facades\DB;

class PassionPageTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @dataProvider panelsProvider
     */
    public function testAdd( $item, $table)
    {
        $this->artisan('db:seed');
        $this->admin = $this->generateAdminUser();
        $this->user = $this->generateUser();

        $this->a_admin_can_view_admin_panel( $item );
        // $this->a_user_cannot_view_admin_panel_when_is_not_admin( $item );
        $this->a_admin_can_register_a_new_passion( $item );
        $this->the_new_passion_has_name( $item );
        $this->the_new_passion_has_type( $item );
        $this->a_admin_can_update_a_passion( $item );
        $this->a_admin_can_delete_a_passion( $item, $table );
    }

    public function panelsProvider()
    {
        return [
            [ 
                "passion", 
                Passion::first()->id
            ],
        ];
    }

    //* Load Test
    public function a_admin_can_view_admin_panel( $item )
    {
        $response = $this->actingAs($this->admin)->get('/admin/'.$item);
        
        $response
            ->assertSuccessful()
            //* Checkif navbar loads correctly
            ->assertSee( $this->admin->name )
            ->assertSee("Contact");
    }

    public function a_user_cannot_view_admin_panel_when_is_not_admin( $item )
    {
        $response = $this->actingAs($this->user)->get('admin/'.$item);
        
        $response->assertRedirect('/');
    }

    //* Create Tests
    public function a_admin_can_register_a_new_passion( $item )
    {
        $response = $this->actingAs($this->admin)->post('admin/'.$item, [
            'name' => "Nume",
            'type' => [ 
                '0' => 1,
            ],
        ]);

        $response->assertRedirect('admin/passion');
    }

    public function the_new_passion_has_name( $item )
    {
        $response = $this->actingAs($this->admin)->post('admin/'.$item, [
            'name' => "",
            'type' => [ 
                '0' => 1,
            ],
        ]);

        $response->assertSessionHasErrors('name');
    }

    public function the_new_passion_has_type( $item )
    {
        $response = $this->actingAs($this->admin)->post('admin/'.$item, [
            'name' => "Name",
            'type' => [ 
                '0' => ''
            ],
        ]);

        $response->assertSessionHasErrors('type');
    }

    //* Update
    public function a_admin_can_update_a_passion( $item )
    {
                
        $passion = Passion::first();

        $response = $this->actingAs($this->admin)->patch('admin/'.$item.'/'. $passion->id, [
            'name' => "New",
            'type' => [ 
                '0' => '1'
            ],
        ]);

        $this->assertEquals("New", Passion::first()->name);
    }

    //* Update
    public function a_admin_can_delete_a_passion( $item, $table )
    {
        dd($table);
        $response = $this->actingAs($this->admin)->delete('/admin/'.$item.'/'. $table, [
            'id' => $table
        ]);

        $response->assertRedirect('admin/'.$item);
    }

    private function generateUser()
    {
        return factory(User::class)->make(
            [
                'admin' => '0',
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
        return factory(User::class)->create(
            [
                'admin' => '1',
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
