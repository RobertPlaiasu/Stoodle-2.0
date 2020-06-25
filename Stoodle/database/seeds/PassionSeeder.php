<?php

use Illuminate\Database\Seeder;

class PassionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('passions')->insert(array(
          array(
            'name' => 'Medicina'
          ),
          array(
            'name' => 'Matematica'
          ),
          array(
            'name' => 'Agricultura'
          ),
          array(
            'name' => 'Ecologie'
          ),
          array(
            'name' => 'Programare / Calculatoare'
          ),
          array(
            'name' => 'Literatura'
          ),
          array(
            'name' => 'Muzica'
          ),
          array(
            'name' => 'Desen'
          ),
          array(
            'name' => 'Arhitectura'
          ),
          array(
            'name' => 'Astronomie'
          ),
          array(
            'name' => 'Sport'
          ),
          array(
            'name' => 'Religie'
          ),
          array(
            'name' => 'Economie'
          ),
          array(
            'name' => 'Business'
          ),
          array(
            'name' => 'Politica'
          ),
          array(
            'name' => 'Limbi straine'
          ),
          array(
            'name' => 'Filozofie'
          ),
          array(
            'name' => 'Drept'
          ),
          array(
            'name' => 'Biologie'
          ),
          array(
            'name' => 'Geografie'
          ),
          array(
            'name' => 'Geologie'
          ),
          array(
            'name' => 'Istorie'
          ),
          array(
            'name' => 'Jurnalism'
          ),
          array(
            'name' => 'Design'
          ),
          array(
            'name' => 'Constructii'
          ),
          array(
            'name' => 'Serviciul militar'
          ),
          array(
            'name' => 'Actorie'
          ),
          array(
            'name' => 'Regie'
          ),
          array(
            'name' => 'Editare video/sunet'
          ),
          array(
            'name' => 'Chimie'
          ),
          array(
            'name' => 'Animale'
          ),
          array(
            'name' => 'Limba romana'
          ),
          array(
            'name' => 'Serviciul in cadrul politiei'
          ),
          array(
            'name' => 'Electronica'
          ),
          array(
            'name' => 'Inginerie electrica'
          ),
          array(
            'name' => 'Cibernetica'
          ),
          array(
            'name' => 'Inginerie Aerospatila'
          ),
        ));
    }
}
