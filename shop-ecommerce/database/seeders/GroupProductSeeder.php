<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class GroupProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('group_products')->insert([
            ['id' => 1,'name' =>'Ba Lô'],
            ['id' => 2,'name' =>'Túi '],
            ['id' => 3,'name' =>'Phụ Kiện'],
         
        ]);
    }
}
