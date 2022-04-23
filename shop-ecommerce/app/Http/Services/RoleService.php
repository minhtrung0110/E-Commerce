<?php
namespace App\Http\Services;


use App\Models\Staffs;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Models\Roles;
use App\Models\Permissions;
use App\Models\RolePermissions;

class RoleService {

    public static function getListRoles(){
        return Roles::orderByDesc('id')->get();
    } 
 
    
}
   


