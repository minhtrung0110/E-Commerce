<?php
namespace App\Http\Services;
use App\Models\image_product;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\TryCatch;
class ImageProductService{
    public function create($request,$id){
        try {
            image_product::create([
               'product_id'=>$id,
               'created_at'=>date('y-m-d h:i:s') 
            ]);
            Session::flash('success','thêm sản phẩm thành công');
        } catch (\Exception $err) {
            Session::flash('error',$err->getMessage());
            return false;
        }
        return true;
    }
}