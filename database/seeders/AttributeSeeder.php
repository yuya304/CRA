<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attributes')->insert([
            'name' => '必修',    
        ]);
        DB::table('attributes')->insert([
            'name' => '選択',    
        ]);
        DB::table('attributes')->insert([
            'name' => '必修',    
        ]);
        DB::table('attributes')->insert([
            'name' => '選択',    
        ]);
        DB::table('attributes')->insert([
            'name' => '必修',    
        ]);
        DB::table('attributes')->insert([
            'name' => '選択',    
        ]);
        DB::table('attributes')->insert([
            'name' => '必修',    
        ]);
        DB::table('attributes')->insert([
            'name' => '選択',    
        ]);
        DB::table('attributes')->insert([
            'name' => '必修',    
        ]);
        DB::table('attributes')->insert([
            'name' => '必修1',    
        ]);
        DB::table('attributes')->insert([
            'name' => '必修2',    
        ]);
        DB::table('attributes')->insert([
            'name' => '選択必修１',    
        ]);
        DB::table('attributes')->insert([
            'name' => '選択必修2',    
        ]);
        DB::table('attributes')->insert([
            'name' => '選択必修3',    
        ]);
        DB::table('attributes')->insert([
            'name' => '選択',    
        ]);
        DB::table('attributes')->insert([
            'name' => '他学科科目',    
        ]);
    }
}
