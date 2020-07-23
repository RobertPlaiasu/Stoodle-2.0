<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Remus',
                'email' => 'remus@test.com',
                'email_verified_at' => '2020-07-15 14:12:24',
                'password' => '$2y$10$6FfvePomWee5MLLJ4ka.QOPWrLK7DsIS2AetuCOX086rOM0DYgXKi',
                'admin' => 1,
                'job' => 1,
                'passion_intensity' => 1,
                'social' => 0,
                'stress' => 1,
                'sport' => 1,
                'county_id' => 1,
                'profil_id' => 5,
                'passion_id' => 26,
                'book_id' => 3,
                'subject_id_1' => 20,
                'subject_id_2' => 5,
                'subject_id_3' => 9,
                'created_at' => '2020-07-15 14:12:01',
                'updated_at' => '2020-07-15 14:12:36'
            ]
        ]);
    }
}
