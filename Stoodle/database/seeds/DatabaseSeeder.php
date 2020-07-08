<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
        $this->call(BookSeeder::class);
        $this->call(CountySeeder::class);
        $this->call(PassionSeeder::class);
        $this->call(ProfilSeeder::class);
        $this->call(SubjectSeeder::class);
        $this->call(UniversitySeeder::class);
        $this->call(QuestionSeeder::class);
        $this->call(PassionTypeSeeder::class);
        $this->call(ProfilTypeSeeder::class);
        $this->call(RegionSeeder::class);
        $this->call(SubjectTypeSeed::class);
    }
}
