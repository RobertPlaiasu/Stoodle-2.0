<?php

use Illuminate\Database\Seeder;

class SubjectTypeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subject_types')->insert([
            ['type' => 'Biologie'],
            ['type' => 'Limbi Straine'],
            ['type' => 'Matematica'],
            ['type' => 'Informatica'],
            ['type' => 'Bussines'],
            ['type' => 'Psihologie'],
            ['type' => 'Geografie'],
        ]);
    }
}
