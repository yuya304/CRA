<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert([
            'name' => '土木工学科',    
        ]);
        DB::table('courses')->insert([
            'name' => '建築学科',    
        ]);
        DB::table('courses')->insert([
            'name' => '機械工学科',    
        ]);
        DB::table('courses')->insert([
            'name' => '電気電子工学科',    
        ]);
        DB::table('courses')->insert([
            'name' => '生命応用化学科',    
        ]);
        DB::table('courses')->insert([
            'name' => '情報工学科',    
        ]);
    }
}
