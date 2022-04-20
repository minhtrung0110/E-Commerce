<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            ['id' => 1,'img' =>'/storage/images/product/'],
            ['id' => 2,'img' =>'/storage/images/product/'],
            ['id' => 3,'img' =>'/storage/images/product/'],
            ['id' => 4,'img' =>'/storage/images/product/'],
            ['id' => 5,'img' =>'/storage/images/product/'],
      
        ]);
    }
}
