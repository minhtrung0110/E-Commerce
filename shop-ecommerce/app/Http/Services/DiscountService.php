<?php
namespace App\Http\Services;
use App\Models\Discounts;



class DiscountService{
public function getAll(){
    return Discounts::all();
}
public function getItems($id){
$discounts =Discounts::where('id',$id)->get();
foreach($discounts as $discount){
    return $discount;
}
   
}
public function create($request){
    try {
        Discounts::create([
            'name'=> $request->input('dis_name'),
            'value'=>$request->input('dis_value'),
            'description'=>$request->input('dis_description'),
            'status'=>$request->input('status'),
            'start_date'=>$request->input('start_date'),
            'end_date'=>$request->input('end_date')
        ]);
        
    } catch (\Exception $err) {
        
        return false;
    }
    return true;
}
public function update($request,$id){
    try {
        
        Discounts::where('id',$id)->update([
            'name'=>$request->input('dis_name'),
            'value'=>$request->input('dis_value'),
            'status'=>$request->input('status'),
            'description'=>$request->input('dis_description'),
            'start_date'=>$request->input('start_date'),
            'end_date'=>$request->input('end_date')
        ]);

    } catch (\Exception $err) {
        return false;
    }
    return true;
}
public function delete($request){
    $id=$request->id;
    $discount=Discounts::where('id',$id)->first();
    if($discount){
        return Discounts::where('id',$id)->delete();
    }
    return false;
}
}