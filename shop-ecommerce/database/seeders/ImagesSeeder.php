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
            ['id' => 1,'img' =>'th.jpg'],
            ['id' => 2,'img' =>'th.jpg'],
            ['id' => 3,'img' =>'th.jpg'],
            ['id' => 4,'img' =>'th.jpg'],
            ['id' => 5,'img' =>'th.jpg'],
      
        ]);
    }
}
