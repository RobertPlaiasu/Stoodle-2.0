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
          'name' => 'Limba si literatura romana'
        ),
        array(
          'name' => 'Engleza'
        ),
        array(
          'name' => 'Franceza'
        ),
        array(
          'name' => 'Germana'
        ),
        array(
          'name' => 'Spaniola'
        ),
        array(
          'name' => 'Fizica'
        ),
        array(
          'name' => 'Matematica'
        ),
        array(
          'name' => 'Educatie fizica'
        ),
        array(
          'name' => 'Religie'
        ),
        array(
          'name' => 'Informatica'
        ),
        array(
          'name' => 'TIC'
        ),
        array(
          'name' => 'Educatie civica'
        ),
        array(
          'name' => 'Desen'
        ),
        array(
          'name' => 'Muzica'
        ),
        array(
          'name' => 'Biologie'
        ),
        array(
          'name' => 'Chimie'
        ),
        array(
          'name' => 'Istorie'
        ),
        array(
          'name' => 'Geografie'
        ),
        array(
          'name' => 'Economie'
        ),
        array(
          'name' => 'ATP'
        ),
        array(
          'name' => 'Latina'
        ),
        array(
          'name' => 'Psihologie'
        ),
        array(
          'name' => 'Sociologie'
        ),
        array(
          'name' => 'Nici una din cele de mai sus'
        ),
      ));
    }
}
