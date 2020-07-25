<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Question;

class QuestionsPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_question_page_loads_corectlly()
    {
        $user = $this->generateUser();

        $response = $this->actingAs($user)->get('/intrebari');
        
        $response
            ->assertSuccessful()
            //* Checkif navbar loads correctly
            ->assertSee( $user->name )
            ->assertSee("Intrebari frecvente");
    }

    public function test_questions_are_visible()
    {
        $this->artisan('db:seed');
        $question = factory( Question::class )->create();

        $user = $this->generateUser();

        $response = $this->actingAs($user)->get('/intrebari');

        $response
            ->assertSuccessful()
            ->assertSee( $question->answer );
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
}
