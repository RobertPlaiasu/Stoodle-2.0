<?php

use Illuminate\Database\Seeder;

class ProfilTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profil_types')->insert([
            ['type' => 'real'],
            ['type' => 'uman'],
            ['type' => 'teologic'],
            ['type' => 'sportiv'],
            ['type' => 'vocational']
        ]);
    }
}
