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
            'name' => 'Culinare'
          ),
          array(
            'name' => 'Arte, tehnica'
          ),
          array(
            'name' => 'Enciclopedii'
          ),
          array(
            'name' => 'Biografii, memorii'
          ),
          array(
            'name' => 'Lingvistica'
          ),
          array(
            'name' => 'Limbi straine'
          ),
          array(
            'name' => 'Teatru'
          ),
          array(
            'name' => 'Poezie / Literatura'
          ),
          array(
            'name' => 'Atlase, ghiduri turistice'
          ),
          array(
            'name' => 'Istorie'
          ),
          array(
            'name' => 'Filozofie'
          ),
          array(
            'name' => 'Psihologie'
          ),
          array(
            'name' => 'Stiinte sociale, politica'
          ),
          array(
            'name' => 'Marketing si comunicare'
          ),
          array(
            'name' => 'Business si economie'
          ),
          array(
            'name' => 'Drept'
          ),
          array(
            'name' => 'Medicina'
          ),
          array(
            'name' => 'Stiinte exacte'
          ),
          array(
            'name' => 'Natura si mediu'
          ),
          array(
            'name' => 'Tehnica si tehnologie'
          ),
          array(
            'name' => 'Computere si internet'
          ),
          array(
            'name' => 'Dezvoltare personala'
          ),
          array(
            'name' => 'Lifestyle, sport'
          ),
        ));
    }
}
