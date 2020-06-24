<?php

use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert(array(
          array(
            'book' => 'Culinare'
          ),
          array(
            'book' => 'Arte, tehnica'
          ),
          array(
            'book' => 'Enciclopedii'
          ),
          array(
            'book' => 'Biografii, memorii'
          ),
          array(
            'book' => 'Lingvistica'
          ),
          array(
            'book' => 'Limbi straine'
          ),
          array(
            'book' => 'Teatru'
          ),
          array(
            'book' => 'Poezie / Literatura'
          ),
          array(
            'book' => 'Atlase, ghiduri turistice'
          ),
          array(
            'book' => 'Istorie'
          ),
          array(
            'book' => 'Filozofie'
          ),
          array(
            'book' => 'Psihologie'
          ),
          array(
            'book' => 'Stiinte sociale, politica'
          ),
          array(
            'book' => 'Marketing si comunicare'
          ),
          array(
            'book' => 'Business si economie'
          ),
          array(
            'book' => 'Drept'
          ),
          array(
            'book' => 'Medicina'
          ),
          array(
            'book' => 'Stiinte exacte'
          ),
          array(
            'book' => 'Natura si mediu'
          ),
          array(
            'book' => 'Tehnica si tehnologie'
          ),
          array(
            'book' => 'Computere si internet'
          ),
          array(
            'book' => 'Dezvoltare personala'
          ),
          array(
            'book' => 'Lifestyle, sport'
          ),
        ));
    }
}
