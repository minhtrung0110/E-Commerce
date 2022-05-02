<?php
namespace App\Http\Services;
use App\Models\Orders;
use App\Models\Customer;
use Illuminate\Support\Facades\Session;

class OrderService{
    public function getOrderLast(){
        return Orders::select('id')->orderByDesc('created_at')->first();
    }
    public function getAll(){
        return Orders::join('order_details','order_details.order_id','=','orders.id')
                        ->join('customers','customers.id','=','orders.customer_id')
                        ->distinct('orders.id')
                        ->get(['orders.id','discount_value','customers.first_name','customers.last_name','orders.status as status_order','orders.total_price']);
        

    }
    public function getStatus(){
        return Orders::join('order_details','order_details.order_id','=','orders.id')
                        ->join('customers','customers.id','=','orders.customer_id')
                        ->distinct('orders.id')->where('orders.status',1)
                        ->get(['orders.id','discount_value','customers.first_name','customers.last_name','orders.status as status_order','orders.total_price']);
        

    }
    public function getItem($id){
        return Orders::join('order_details','order_details.order_id','=','orders.id')
                        ->join('products','products.id','=','order_details.product_id')
                        ->join('product_details','product_details.product_id','=','products.id')
                        ->join('customers','customers.id','=','orders.customer_id')->distinct('orders.id')
                        ->where('orders.id',$id)
                        ->get(['orders.status as status_order','products.name','order_details.amount as amount_detail','product_details.price','product_details.code_color',
                    'product_details.amount','customers.first_name','customers.last_name','phone','email','orders.address as address_orders','orders.created_at']);
    }
    public function update($request,$id){
        try {
            Orders::where('id',$id)->update(['status'=>$request]);
            

        } catch (\Exception $err) {
            
            return false;
        }
        return true;
    }
    public function setStatus($id,$status){
        try {
            Orders::where('id',$id)->update(['status'=>$status]);
            

        } catch (\Exception $err) {
            
            return false;
        }
        return true;
    }
}