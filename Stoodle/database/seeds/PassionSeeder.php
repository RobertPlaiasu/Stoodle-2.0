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
            'passion' => 'Medicina'
          ),
          array(
            'passion' => 'Matematica'
          ),
          array(
            'passion' => 'Agricultura'
          ),
          array(
            'passion' => 'Ecologie'
          ),
          array(
            'passion' => 'Programare / Calculatoare'
          ),
          array(
            'passion' => 'Literatura'
          ),
          array(
            'passion' => 'Muzica'
          ),
          array(
            'passion' => 'Desen'
          ),
          array(
            'passion' => 'Arhitectura'
          ),
          array(
            'passion' => 'Astronomie'
          ),
          array(
            'passion' => 'Sport'
          ),
          array(
            'passion' => 'Religie'
          ),
          array(
            'passion' => 'Economie'
          ),
          array(
            'passion' => 'Business'
          ),
          array(
            'passion' => 'Politica'
          ),
          array(
            'passion' => 'Limbi straine'
          ),
          array(
            'passion' => 'Filozofie'
          ),
          array(
            'passion' => 'Drept'
          ),
          array(
            'passion' => 'Biologie'
          ),
          array(
            'passion' => 'Geografie'
          ),
          array(
            'passion' => 'Geologie'
          ),
          array(
            'passion' => 'Istorie'
          ),
          array(
            'passion' => 'Jurnalism'
          ),
          array(
            'passion' => 'Design'
          ),
          array(
            'passion' => 'Constructii'
          ),
          array(
            'passion' => 'Serviciul militar'
          ),
          array(
            'passion' => 'Actorie'
          ),
          array(
            'passion' => 'Regie'
          ),
          array(
            'passion' => 'Editare video/sunet'
          ),
          array(
            'passion' => 'Chimie'
          ),
          array(
            'passion' => 'Animale'
          ),
          array(
            'passion' => 'Limba romana'
          ),
          array(
            'passion' => 'Serviciul in cadrul politiei'
          ),
          array(
            'passion' => 'Electronica'
          ),
          array(
            'passion' => 'Inginerie electrica'
          ),
          array(
            'passion' => 'Cibernetica'
          ),
          array(
            'passion' => 'Inginerie Aerospatila'
          ),
        ));
    }
}
