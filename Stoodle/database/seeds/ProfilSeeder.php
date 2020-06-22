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
              'profil' => 'Mate-info'
            ),
            array(
               'profil' => 'Filologie'
            ),
          ));
    }
}
