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
            'profil' => 'Teologic'
          ),
          array(
            'profil' => 'Filologie'
          ),
          array(
            'profil' => 'Stiinte ale naturii'
          ),
          array(
            'profil' => 'Sportiv'
          ),
          array(
            'profil' => 'Mate-info'
          ),
          array(
            'profil' => 'Tehnologic'
          ),
          array(
            'profil' => 'Arhitectura'
          ),
          array(
            'profil' => 'Actorie'
          ),
          array(
            'profil' => 'Stiinte-sociale'
          ),
        ));
    }
}
