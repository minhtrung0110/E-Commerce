<?php
namespace App\Http\Services;
use App\Models\Orders;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderService{
    public function getOrderLast(){
        return Orders::select('id')->orderByDesc('created_at')->first();
    }
    public function getAll(){
        return Orders::join('order_details','order_details.order_id','=','orders.id')
                        ->join('customers','customers.id','=','orders.customer_id')
                        ->distinct('orders.id')
                        ->get(['orders.id','discount_value','customers.first_name','customers.last_name','orders.status as status_order','orders.total_price','Orders.created_at']);
        

    }
    public function getSearch($request){
        $orders= Orders::join('order_details','order_details.order_id','=','orders.id')
        ->join('customers','customers.id','=','orders.customer_id')
        ->where('orders.created_at','>=',$request->input('start_date'))
        ->where('orders.created_at','<=',$request->input('end_date'))
        ->distinct('orders.id');
        if(!is_null($request->input('name_customer'))){
            $orders->where('customers.first_name','like','%'.$request->input('name_customer').'%')->orwhere('customers.last_name','like','%'.$request->input('name_customer').'%');
        }
        if(!is_null($request->input('status'))){
            $orders->where('orders.status',$request->input('status'));
        }
        if(!is_null($request->input('discount'))){
            $orders->where('discount_value',$request->input('discount'));
        }
        return $orders->get(['orders.id','discount_value','customers.first_name','customers.last_name','orders.status as status_order','orders.total_price','Orders.created_at']);


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
                        ->join('images','images.id','=','products.id')
                        ->join('customers','customers.id','=','orders.customer_id')->distinct('orders.id')
                        ->where('orders.id',$id)
                        ->get(['customers.id','orders.status as status_order','products.name','order_details.amount as amount_detail','product_details.price','product_details.code_color',
                    'product_details.amount','customers.first_name','customers.last_name','phone','email','orders.address as address_orders','orders.created_at','orders.discount_value','images.img']);
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
    public function check($id_cus,$id_product){
      
          $result= Orders::join('order_details','order_details.order_id','=','Orders.id')
                    ->where('customer_id',$id_cus)->where('product_id',$id_product)->get();
                
       if(count($result) !=0){
           return true;
       }else{
           return false;
       }
    }
}