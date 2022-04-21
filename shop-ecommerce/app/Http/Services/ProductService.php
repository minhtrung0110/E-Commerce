<?php
namespace App\Http\Services;
use App\Models\Product;

class ProductService{
    public function getAllProduct(){
     
        
        return Product::join('image_products','image_products.product_id','=','products.id')
        ->join('images','images.id','=','image_products.image_id')
        ->join('group_products','group_products.id','=','products.group_id')
        ->join('product_details','product_details.product_id','=','products.id')
        ->orderBy('products.id', 'DESC')
        ->get(['products.id','group_products.name','products.name as name_product','description','price','amount','active'])
        ;
    }
    public function getProduct($id){
        return Product::join('image_products','image_products.product_id','=','products.id')
        ->join('images','images.id','=','image_products.image_id')
        ->join('group_products','group_products.id','=','products.group_id')
        ->join('product_details','product_details.product_id','=','products.id')
        ->where('products.id',$id)
        ->get(['products.id','group_products.name','products.name as name_product','description','price','amount','active'])
        ;
    }
}