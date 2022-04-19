<?php
namespace App\Http\Services;

use App\Models\Staff;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class StaffService {

    public function findStaff($email){
        
        return Staff::select('id','role_id','email','password')->where('email',$email)->first();
    }

 
    
}
   


