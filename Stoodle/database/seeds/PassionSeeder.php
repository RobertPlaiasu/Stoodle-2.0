<?php

use Illuminate\Database\Seeder;

class PassionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('passions')->insert(array(
          array(
            'passion' => 'Matematica'
          ),
          array(
              'passion' => 'Fizica'
          ),
        ));
    }
}
