<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\StaffSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(StaffSeeder::class);
       // \App\Models\Staff::factory(10)->create();
    }
}
