<?php
namespace App\Http\Services;
use App\Models\images;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\TryCatch;
class ImagesService{
    public function create($request,$id){
        try {
            images::create([
              // 'id'=>$id,
               'img'=>(string) $request->input('Img_link"'),
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