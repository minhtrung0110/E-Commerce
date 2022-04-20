<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            ['id' => 1,'group_id'=>1,'name'=>'Ba Lô Mùa Hẻ','description'=>'Ba Lô Đẹp','active'=>1,'created_at'=> date('Y-m-d H:i:s'),'updated_at'=> date('Y-m-d H:i:s')],
            ['id' => 2,'group_id'=>3,'name'=>'Túi Mang Vai Xinh','description'=>'Ba Lô Đẹp','active'=>1,'created_at'=> date('Y-m-d H:i:s'),'updated_at'=> date('Y-m-d H:i:s')],
            ['id' => 3,'group_id'=>2,'name'=>'Deasea Green Minnibag','description'=>'Ba Lô Đẹp','active'=>1,'created_at'=> date('Y-m-d H:i:s'),'updated_at'=> date('Y-m-d H:i:s')],
            ['id' => 4,'group_id'=>4,'name'=>'Ví Nhỏ','description'=>'Ba Lô Đẹp','active'=>1,'created_at'=> date('Y-m-d H:i:s'),'updated_at'=> date('Y-m-d H:i:s')],
            ['id' => 5,'group_id'=>1,'name'=>'Ba Lô Mùa Hẻ','description'=>'Ba Lô Đẹp','active'=>1,'created_at'=> date('Y-m-d H:i:s'),'updated_at'=> date('Y-m-d H:i:s')],

      
        ]);
    }
}
