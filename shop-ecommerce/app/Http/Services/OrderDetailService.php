<?php
namespace App\Http\Services;
use App\Models\Orders;
use App\Models\OrderDetail;
use App\Models\Customer;
use Illuminate\Support\Facades\Session;

class OrderDetailService{
    
    public function getItem($id){
        return OrderDetail::join('orders','orders.id','=','order_details.order_id')
                        ->join('products','products.id','=','order_details.product_id')
                        ->join('product_details','product_details.product_id','=','products.id')
                        ->join('image_products','image_products.product_id','=','products.id')        
                        ->join('images','images.id','=','image_products.image_id')              
                        ->where('order_details.order_id',$id)
                        ->get(['orders.status as status_order','products.name','order_details.amount as amount_detail',
                        'product_details.price as product_price','product_details.code_color','products.id as product_id',
                        'orders.address as address_orders','orders.created_at','orders.discount_value','images.img']);
    }
  
}