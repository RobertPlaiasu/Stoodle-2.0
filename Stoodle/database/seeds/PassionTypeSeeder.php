<?php

use Illuminate\Database\Seeder;

class PassionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('passion_types')->insert([
            ['type' => 'Programare'],
            ['type' => 'Inginerie'],
            ['type' => 'Medicina'],
            ['type' => 'Politica'],
            ['type' => 'Jurnalism'],
            ['type' => 'Lingvistica'],
            ['type' => 'Geografie'],
            ['type' => 'Sport'],
            ['type' => 'Bussines'],
            ['type' => 'Armata'],
            ['type' => 'Design'],
            ['type' => 'Religie'],
            ['type' => 'Geologie'],
        ]);
    }
}
