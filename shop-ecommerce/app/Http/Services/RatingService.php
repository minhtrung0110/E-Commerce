<?php
namespace App\Http\Services;
use App\Models\Ratings;

use Illuminate\Support\Facades\Session;

class RatingService{
   public function getAll_oneIdProduct($id){
       return Ratings::join('customers','customers.id','=','ratings.customer_id')
       ->where('product_id',$id)->get();
   }
   public function create($request,$id_cus){
       try {
           Ratings::create([
               'customer_id'=>$id_cus,
               'product_id'=>$request->input('product_id'),
               'point'=>$request->input('point'),
               'context'=>$request->input('context'),
               'image'=>'null'
           ]);
       } catch (\Exception $err) {
            return false;
        }
        return true;
   }
}