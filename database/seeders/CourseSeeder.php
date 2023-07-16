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
            'name' => '土木工学科 社会基盤デザインコース',    
        ]);
        DB::table('courses')->insert([
            'name' => '土木工学科 環境デザインコース',
        ]);
        DB::table('courses')->insert([
            'name' => '建築学科 建築エンジニアリングコース',    
        ]);
        DB::table('courses')->insert([
            'name' => '建築学科 建築デザインコース',    
        ]);
        DB::table('courses')->insert([
            'name' => '建築学科 アーキテクトコース',    
        ]);
        DB::table('courses')->insert([
            'name' => '機械工学科',    
        ]);
        DB::table('courses')->insert([
            'name' => '電気電子工学科 電子情報通信コース',    
        ]);
         DB::table('courses')->insert([
            'name' => '電気電子工学科 電気エネルギーコース',    
        ]);
        DB::table('courses')->insert([
            'name' => '生命応用化学科',    
        ]);
        DB::table('courses')->insert([
            'name' => '情報工学科 情報システムコース',    
        ]);
        DB::table('courses')->insert([
            'name' => '情報工学科 情報デザインコース',    
        ]);
    }
}
