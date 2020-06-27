<?php

use Illuminate\Database\Seeder;

class ProfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profils')->insert(array(
          array(
            'name' => 'Teologic'
          ),
          array(
            'name' => 'Filologie'
          ),
          array(
            'name' => 'Stiinte ale naturii'
          ),
          array(
            'name' => 'Sportiv'
          ),
          array(
            'name' => 'Mate-info'
          ),
          array(
            'name' => 'Tehnologic'
          ),
          array(
            'name' => 'Arhitectura'
          ),
          array(
            'name' => 'Actorie'
          ),
          array(
            'name' => 'Stiinte-sociale'
          ),
        ));
    }
}
