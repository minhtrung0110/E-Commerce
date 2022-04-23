<?php
namespace App\Http\Services;

use App\Models\Staffs;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class StaffService {

    public function findStaff($email){
        
        return Staffs::select('id','role_id','email','password')->where('email',$email)->first();
    }
    public function getInFo($id){
        return Staffs::all()->where('id',$id)->first();
    }
    public function getAll(){
        return Staffs::orderbyDesc('id')->get();
    }
    public function create($request){

        try {
            $staff= Staffs::create([
                'role_id'=>(int)$request->input('role_id'),
                'first_name'=>(string)$request->input('first_name'),
                'last_name'=>(string)$request->input('last_name'),
                'phone'=>(string)$request->input('phone'),
                'email'=>(string)$request->input('email'),
                'password'=>(string)bcrypt($request->input('password')),
                'status'=>(int)$request->input('status'),
                'address'=>(string)$request->input('address'),
                'start_date'=>(string)$request->input('start_date'),
                'end_date'=>(string)$request->input('end_date'),

            ]);
        } 
             catch (\Exception $err) {
                Session::flash('error',$err->getMessage());
                return false;
            }
            return true;
          
        }

 
    
}
   


