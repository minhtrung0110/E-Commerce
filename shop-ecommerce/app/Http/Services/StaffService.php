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

 
    
}
   


