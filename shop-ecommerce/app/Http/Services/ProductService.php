<?php
namespace App\Http\Services;
use App\Models\Product;

class ProductService{
    public function getAllProduct(){
     
        
        return Product::all();
    }
    public function getProduct($id){
        return Product::join('group_product','group_product.id','=','products.group_id') // lấy category
                        ->join('product_detail','product_detail.product_id'.'=','products.id') // lấy thông tin chi tiết product_detail
                        ->join('image_product','image_product.product_id','=','product.id')// lấy group image
                        ->join('images','images.id','=','image_product.image_id')
                        ->where('products',$id)
                        ->get(['group_product.name,images.thumb,products.name,products.description,products.active
                        ,product_detail.code_color,product_detail.amount,product_detail.price']);
        
    }
}