<?php
namespace App\Http\Services;

use App\Models\Staff;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class StaffService {

    public function findStaff($email){
        
        return Staff::select('email','password')->where('email',$email)->first();
    }
    public function getPassword($email){
        
        return Staff::select('password')->where('email',$email)->get();
    }
    public function checkLogin($email,$password){
        
        return Staff::select('phone','email','password')->where('email',$email)->where('password',$password)->get();
    }

    
}
   


