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
<<<<<<< HEAD
            ['id' => 1,'name' =>'Ba Lô','thumb'=>'th.jpg'],
            ['id' => 2,'name' =>'Túi Nhỏ','thumb'=>'th.jpg'],
            ['id' => 3,'name' =>'Túi Mang Vai','thumb'=>'th.jpg'],
            ['id' => 4,'name' =>'Ví','thumb'=>'th.jpg'],
=======
            ['id' => 1,'name' =>'Ba Lô'],
            ['id' => 2,'name' =>'Túi '],
            ['id' => 3,'name' =>'Phụ Kiện'],
         
>>>>>>> 258f3b411d89c24158b84742c89e3fcda2b03a6c
        ]);
    }
}
