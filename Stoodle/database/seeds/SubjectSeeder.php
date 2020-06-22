<?php

use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->insert(array(
            array(
              'subject' => 'Matetica'
            ),
            array(
               'subject' => 'Fizica'
            ),
          ));
    }
}
