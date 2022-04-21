<?php
namespace App\Http\Services;
use App\Models\Product_detail;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\TryCatch;
class ProductDetailService{
    public function create($request,$id){
        try {
            Product_detail::create([
               'product_id'=>$id,
               'code_color'=>(string) $request->input('Code_color'),
               'amount'=>(int) $request->input('Amount'),
               'price'=>(int) $request->input('Price'),
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