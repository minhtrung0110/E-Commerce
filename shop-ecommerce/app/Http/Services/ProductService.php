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
    public function create($request){
        try {
                Product::create([
                'group_id'=>$request->input('Category'),
                'name'=>$request->input('Product_name'),
                'description'=> $request->input('Description'),
                'active'=>$request->input('active'),
                'created_at'=>date('y-m-d h:i:s'),
            ]);
            $lastId=Product::last('id');
            Product_detail::create([
                'product_id'=>$lastId,
                'code_color'=>(string) $request->input('Code_color'),
                'amount'=>(int) $request->input('Amount'),
                'price'=>(int) $request->input('Price'),
                'created_at'=>date('y-m-d h:i:s') 
             ]);
            Session::flash('success','Thêm sản phẩm thành công');
        } catch (\Exception $err) {
            Session::flash('error',$err->getMessage());
            return false;
            
        }
        return $lastId;
    }
}