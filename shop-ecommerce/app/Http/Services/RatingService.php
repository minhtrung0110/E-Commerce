<?php
namespace App\Http\Services;
use App\Models\Ratings;

use Illuminate\Support\Facades\Session;

class RatingService{
    public function getAll(){
        return Ratings::join('products','products.id','=','ratings.product_id')
                        ->join('customers','customers.id','=','ratings.customer_id')
                        ->join('image_products','image_products.product_id','=','products.id')
                        ->join('images','images.id','=','image_products.image_id')
                        ->orderBy('ratings.id', 'DESC')
                        ->get([
                                'ratings.id as id_rating',
                                'customers.first_name',
                                'customers.last_name',
                                'customers.email',
                                'customers.id as customer_id',
                                'ratings.context',
                                'ratings.point',
                                'products.id as product_id',
                                'products.name as product_name',
                                'images.img',
                                'ratings.created_at']);
    }
   
    public function getSearch($request){
        $query= Ratings::query();
        $query=$query->join('products','products.id','=','ratings.product_id')
        ->join('customers','customers.id','=','ratings.customer_id')
        ->join('image_products','image_products.product_id','=','products.id')
        ->join('images','images.id','=','image_products.image_id');
        if(!is_null($request->input('category'))){
        $query->where('products.group_id',$request->input('category'));

       }
       if ($request->has('search') && !is_null($request->input('search')) && $request->has('searchFor')  ){
        switch ($request->input('searchFor')) {
            case 'product_name':
                $query = $query
                ->where('products.name', 'like', '%' . $request->input('search') . '%');
                break;
            case 'customer_name':
                $query = $query
                ->where('customers.first_name', 'like', '%' . $request->input('search') . '%')
                ->orwhere('customers.last_name', 'like', '%' . $request->input('search') . '%');
                break;
            case 'customer_id':
                $query = $query->where('customers.id', $request->input('search'));
                break;
            case 'product_id':
                    $query = $query->where('products.id', $request->input('search'));
                break;
            case 'email':
                    $query = $query->where('customer.email', $request->input('search'));
                break;
            
        }
      
    }
       if(!is_null($request->input('point'))){
        $query->where('ratings.point',$request->input('point'));
       }
       if(!is_null($request->input('category'))){
        $query->where('products.group_id',$request->input('category'));
       }
       if(!is_null($request->input('start_date') )&& !is_null($request->input('end_date'))){
        $query ->where('ratings.created_at','>=',$request->input('start_date'))
        ->where('ratings.updated_at','<=',$$request->input('end_date'));
       }

        return $query->get([
            'ratings.id as id_rating',
            'customers.first_name',
            'customers.last_name',
            'customers.email',
            'customers.id as customer_id',
            'ratings.context',
            'ratings.point',
            'products.id as product_id',
            'products.name as product_name',
            'images.img',
            'ratings.created_at']);

    }
    public function getPoint($point){
        return Ratings::join('products','products.id','=','ratings.product_id')
                        ->join('customers','customers.id','=','ratings.customer_id')
                        ->join('image_products','image_products.product_id','=','products.id')
                        ->join('images','images.id','=','image_products.image_id')
                        ->where('ratings.point',$point)->orderBy('ratings.id', 'DESC')
                        ->get([
                                'ratings.id as id_rating',
                                'customers.first_name',
                                'customers.last_name',
                                'ratings.context',
                                'ratings.point',
                                'products.name',
                                'images.img']);
    }
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