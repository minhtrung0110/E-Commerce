<?php
namespace App\Http\Services;

use App\Models\Customer;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class CustomerService {

    public function findCustomerwithEmail($email){
        
        return Customer::select('id','email','password')->where('email',$email)->where('status',1)->first();
    }
    public static function getInFo($id){
        return Customer::where('id',$id)->first();
    }
    public function update($request): bool
    {
        try {           
            Customer::where("id", $request->input('customer_id'))->update([
            'first_name' => (string)$request->input('first_name'),
            'last_name' => (string)$request->input('last_name'),
            'phone' => (string)$request->input('phone'),
            'gender' => (string)$request->input('gender'),  
            'address' => (string)$request->input('address'),
            ]);
        
        }  catch (\Exception $err)  {
            // session()->flash('error', 'Cập nhật nhân viên thất bại !!! ');
              //Log::info($err->getMessage());
             return false;
         }
         return true;

        }
        public function changePassword($request): bool
        {
            try {           
                Customer::where("id", $request->input('customer_id'))->update([               
                'password' => (string)bcrypt($request->input('new_password')),
                ]);
            
            }  catch (\Exception $err)  {
                // session()->flash('error', 'Cập nhật nhân viên thất bại !!! ');
                  //Log::info($err->getMessage());
                 return false;
             }
             return true;
    
        }
    
}
   


