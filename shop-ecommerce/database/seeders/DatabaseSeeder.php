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
        //$this->call(StaffSeeder::class);
        $this->call(GroupProductSeeder::class);
        $this->call(ImageProductSeeder::class);
         $this->call(ImagesSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ProductDetailSeeder::class);
        //   \App\Models\Staff::factory(15)->create();
    }
}
