<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use DateTime;

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
            'course_id' => '10',
            'student_number' => 20216002,
            'name' => '青木悠弥',
            'email' => 'yuyaaoki34@gmail.com',
            'password' => Hash::make('password'),
            'grade' => 3,
            'admission' => 2021,
        ]);
    }
}
