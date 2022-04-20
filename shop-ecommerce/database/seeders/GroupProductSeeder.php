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
        DB::table('group_product')->insert([
            ['id' => 1,'name' =>'Ba Lô'],
            ['id' => 2,'name' =>'Túi Nhỏ'],
            ['id' => 3,'name' =>'Túi Mang Vai'],
            ['id' => 4,'name' =>'Ví'],
        ]);
    }
}
