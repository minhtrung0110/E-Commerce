<?php
namespace App\Helpers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class Helper{
    public static function renderGroupProducts($menus ){
        $html='';
        foreach ($menus as $key => $menu) {
           
                $html .= '
                    <li>
                        <a href="/products/' . $menu->id . '-' . Str::slug($menu->name, '-') . '.html">
                            ' . $menu->name . '
                        </a>';

              
                $html .= '</li>';
            
        }
        return $html;
    }
    public static function renderUserLogin(){
        $html='';
       $customer_id= Session::get('customer_id');
       $checkLogin= Session::get('customer_login');
       if($checkLogin==true && !is_null($customer_id) ){
           $data=\App\Http\Services\CustomerService::getInFo($customer_id);
           $customer_firstname=$data->first_name;
           $customer_lastname=$data->last_name;
            $html='
  
            <div class="dropdown">
                <button class="dropbtn">
                     
                        <span>'. $customer_firstname.' '.$customer_lastname.'</span>                
                        
                </button>
            <div class="dropdown-content">
                <a href="/myprofile">Thông Tin Tài Khoản</a> </a>
                <a href="/logout">Đăng Xuât</a> </a>
            </div>
            </div>
            ';
       }
       else $html='
       <a href="/login" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 " >
             <i class="zmdi zmdi-account-circle"></i>
       </a>
       ';
       return $html;
    }
    public static function active($active = 0): string
    {
        return $active == 0 ? '<span class="btn btn-danger btn-xs">HUỶ</span>'
            : '<span class="btn btn-success btn-xs">KÍCH HOẠT</span>';
    }

    public static function renderListViewStaff($listStaffs){
        $html='';
        foreach ($listStaffs as $key => $staff) {
            $html .='
              <tr>
              <td>'.$staff->id.'</td>
              <td>'.$staff->first_name.' '. $staff->last_name.'</td>
              <td>'.$staff->role_id.'</td>
              <td>'.$staff->phone.'</td>
              <td>'.$staff->email.'</td>
              <td style="width:10%">'.$staff->password.'</td>
              <td>'.$staff->address.'</td>
              <td>'.self::active($staff->status).'</td>
              <td>
              <a  class="btn btn-primary btn-sm" href="/admin/staffs/edit/'.$staff->id.'"><i class="fas fa-edit"></i></a>
                    <a  class="btn btn-danger btn-sm" onclick="removeRow(' . $staff->id . ', \'/admin/staffs/destroy\')")" ><i class="fas fa-trash"></i></a></td>
            </tr>';
            }        

        return $html;
    }
    public static function renderClassNameForNavItem( $request){
        $html='';
        if ($request->is('admin/staffs/*')) {
            $html='menu-is-opening menu-open ';
        }

        return $html;
    }
}