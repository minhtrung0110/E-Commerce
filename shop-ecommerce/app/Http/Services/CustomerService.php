<?php
namespace App\Http\Services;

use App\Models\Customer;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class CustomerService {

    public function findCustomerwithEmail($email){
        
        return Customer::select('id','email','password')->where('email',$email)->where('status',1)->first();
    }
    public function getInFo($id){
        return Customer::all()->where('id',$id)->first();
    }

 
    
}
   


