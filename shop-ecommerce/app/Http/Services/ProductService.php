<?php
namespace App\Http\Services;
use App\Models\Product;
use App\Models\Product_detail;

use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\TryCatch;

class ProductService{
    public function getAllProduct(){
     
        
        return Product::join('image_products','image_products.product_id','=','products.id')
        ->join('images','images.id','=','image_products.image_id')
        ->join('group_products','group_products.id','=','products.group_id')
        ->join('product_details','product_details.product_id','=','products.id')
        ->orderBy('products.id', 'DESC')
        ->get(['products.id','group_products.name','products.name as name_product','description','price','amount','active','code_color','img'])
        ;
    }
    public function getProduct($id){
        return Product::join('image_products','image_products.product_id','=','products.id')
        ->join('images','images.id','=','image_products.image_id')
        ->join('group_products','group_products.id','=','products.group_id')
        ->join('product_details','product_details.product_id','=','products.id')
        ->where('products.id',$id)
        ->get(['group_products.id as cate_id','products.id','group_products.name','products.name as name_product','description','price','amount','active','code_color','images.img'])
        ->first();
    }
    public function getRelativeProducts($id='',$group_id=''){
        return Product::join('image_products','image_products.product_id','=','products.id')
        ->join('images','images.id','=','image_products.image_id')
        ->join('group_products','group_products.id','=','products.group_id')
        ->join('product_details','product_details.product_id','=','products.id')
        ->where('products.id','!=',$id)
        ->where('products.group_id',$group_id)
        ->orderBy('products.created_at', 'DESC')
        ->get(['group_products.id as cate_id','products.id','group_products.name','products.name as name_product','description','price','amount','active','code_color','images.img'])
        ;
    }
    public function getNewArrivalProducts(){
     
        
        return Product::join('image_products','image_products.product_id','=','products.id')
        ->join('images','images.id','=','image_products.image_id')
        ->join('group_products','group_products.id','=','products.group_id')
        ->join('product_details','product_details.product_id','=','products.id')
        ->orderBy('products.created_at', 'DESC')
        ->skip(0)->take(8)
        ->get(['products.id','group_products.name','products.name as name_product','description','price','amount','active','code_color','images.img'])
        ;
    }
    public function create($request){
       try {
          $products=Product::create([
                'group_id'=>(int)$request->input('Category'),
                'name'=>(string)$request->input('Product_name'),
                'description'=>(string)$request->input('Description'),
                'active'=>(int)$request->input('active')
          ]);
          $id=$products->id;

       } catch (\Exception $err) {
           return false;
       }
       return $id;
    }
    public function createDetail($request,$id){
        try {
            Product_detail::create([
                'product_id'=>(int)$id,
                'code_color'=>(string)$request->input('Code_color'),
                'amount'=>(int)$request->input('Amount'),
                'price'=>(int)$request->input('Price')
            ]);
        } catch (\Exception $err) {
            return false;
        }
        return true;
    }
    public function update($request,$id){
        try {
            Product::where('id',$id)->update([
                'group_id'=>(int)$request->input('Category'),
                'name'=>(string)$request->input('Product_name'),
                'description'=>(string)$request->input('Description'),
                'active'=>(int)$request->input('active')
            ]);
           Product_detail::where('product_id',$id)->update([
               'code_color'=>(string)$request->input('Code_color'),
               'amount'=>(int)$request->input('Amount'),
               'price'=>(int)$request->input('Price')
           ]);
        } catch (\Exception $err) {
            return false;
        }
        return true;
    }
}