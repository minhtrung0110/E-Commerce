<?php
namespace App\Http\Services;
use App\Models\Imports;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\TryCatch;

class ImportService{
    public function create($request){
        $qty = (int)$request->input('amount');
        $product_id = (int)$request->input('product');
        $category=(int)$request->input('category');
        $price=(int)$request->input('price');
        $provider=(int)$request->input('name_provider');
    

        if ($qty <= 0 || $product_id <= 0) {
            //  Session::flash('error', 'Số lượng hoặc Sản phẩm không chính xác');
            return false;
        }
            
        $imports = Session::get('imports');
        if (!is_null($imports)) {
            $id=count($imports);
            
           $imports[$id] = [
                'id'=>$id,
                'provide_id'=>$provider,
                'category_id'=>$category,
                'product_id'=>$product_id,
                'amount'=>$qty,
                'price'=>$price
                
            ];
            Session::put('imports',$imports);
            return true;
        }else{
            $imports[0] =[
                'id'=>0,
            'provide_id'=>$provider,
            'category_id'=>$category,
            'product_id'=>$product_id,
            'amount'=>$qty,
            'price'=>$price
            
        ];
        Session::put('imports',$imports);
        return true;
        }

       
      
    }
}