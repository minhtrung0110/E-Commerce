<?php
namespace App\Http\Services;
use App\Models\GroupProduct;
use Illuminate\Support\Facades\Session;

class GroupProduct_Service{
    public function getAll(){
        return GroupProduct::all();
    }
    public function add_Cate($request){
        try {
            GroupProduct::create([
                'name'=> $request->input('Cate_name')
            ]);
            
        } catch (\Exception $err) {
            
            return false;
        }
        return true;
    }
    public function delete($request){
        $id=$request->id;
        $category=GroupProduct::where('id',$id)->first();
        if($category){
            return GroupProduct::where('id',$id)->delete();
        }
        return false;
    }
}