<?php

use Illuminate\Database\Seeder;

class UniversitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('universities')->insert(array(
            array(
              'name' => 'Universitatea Babes-Bolyai'
            ),
            array(
              'name' => 'UniBuc'
            ),
            array(
              'name' => 'Universitatea Tehnica Cluj'
            )
        ));
    }
}
