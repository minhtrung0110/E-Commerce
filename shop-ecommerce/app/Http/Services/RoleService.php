<?php
namespace App\Http\Roles;
namespace App\Http\Permissions;
namespace App\Http\RolePermissions;

use App\Models\Staffs;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class RoleService {

    public static function getInFoPermissions($role_id){
        return Roles::all()->where('role_id', $role_id)->first();
    } 
 
    
}
   


