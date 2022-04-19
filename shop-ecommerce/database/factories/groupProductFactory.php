<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Group_product;
class groupProductFactory extends Factory
{
   
     protected $model =Group_product::class;
     
    public function definition()
    {
        return [
           'name'=>$this->faker->lastName,
           
           'created_at' => date('Y-m-d H:i:s'),
           'updated_at' => date('Y-m-d H:i:s'),

        ];
    }
}
