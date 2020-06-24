<?php

use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('subjects')->insert(array(
        array(
          'subject' => 'Limba si literatura romana'
        ),
        array(
          'subject' => 'Engleza'
        ),
        array(
          'subject' => 'Franceza'
        ),
        array(
          'subject' => 'Germana'
        ),
        array(
          'subject' => 'Spaniola'
        ),
        array(
          'subject' => 'Fizica'
        ),
        array(
          'subject' => 'Matematica'
        ),
        array(
          'subject' => 'Educatie fizica'
        ),
        array(
          'subject' => 'Religie'
        ),
        array(
          'subject' => 'Informatica'
        ),
        array(
          'subject' => 'TIC'
        ),
        array(
          'subject' => 'Educatie civica'
        ),
        array(
          'subject' => 'Desen'
        ),
        array(
          'subject' => 'Muzica'
        ),
        array(
          'subject' => 'Biologie'
        ),
        array(
          'subject' => 'Chimie'
        ),
        array(
          'subject' => 'Istorie'
        ),
        array(
          'subject' => 'Geografie'
        ),
        array(
          'subject' => 'Economie'
        ),
        array(
          'subject' => 'ATP'
        ),
        array(
          'subject' => 'Latina'
        ),
        array(
          'subject' => 'Psihologie'
        ),
        array(
          'subject' => 'Sociologie'
        ),
        array(
          'subject' => 'Nici una din cele de mai sus'
        ),
      ));
    }
}
