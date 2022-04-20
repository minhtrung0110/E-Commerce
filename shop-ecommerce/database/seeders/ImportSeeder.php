<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ImportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('imports')->insert([
            ['id' => 1,'total_price'=>500000],
            ['id' => 2,'total_price'=>700000],
        ]);
    }
}
