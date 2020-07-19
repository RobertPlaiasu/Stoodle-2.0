<?php

use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regions')->insert([
            ['type' => 'Transilvania'],
            ['type' => 'Moldova'],
            ['type' => 'Sud']
        ]);
    }
}
