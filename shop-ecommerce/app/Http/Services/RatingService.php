<?php
namespace App\Http\Services;
use App\Models\Ratings;

use Illuminate\Support\Facades\Session;

class RatingService{
   public function getAll_oneIdProduct($id){
       return Ratings::join('customers','customers.id','=','ratings.customer_id')
       ->where('product_id',$id)->get();
   }
}