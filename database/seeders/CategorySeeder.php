<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => '教養科目',    
        ]);
        DB::table('categories')->insert([
            'name' => '外国語科目',    
        ]);
        DB::table('categories')->insert([
            'name' => '体育科目',    
        ]);
        DB::table('categories')->insert([
            'name' => '自然科学科目',    
        ]);
        DB::table('categories')->insert([
            'name' => '専門共通科目',    
        ]);
        DB::table('categories')->insert([
            'name' => '土木工学科',    
        ]);
        DB::table('categories')->insert([
            'name' => '建築学科',    
        ]);
        DB::table('categories')->insert([
            'name' => '機械工学科',    
        ]);
        DB::table('categories')->insert([
            'name' => '電気電子工学科',    
        ]);
        DB::table('categories')->insert([
            'name' => '生命応用化学科',    
        ]);
        DB::table('categories')->insert([
            'name' => '情報工学科',
        ]);
    }
}
