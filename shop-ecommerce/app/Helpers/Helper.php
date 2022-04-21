<?php
namespace App\Helpers;
use Illuminate\Support\Str;
class Helper{
        
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
                    <a  class="btn btn-danger btn-sm" onclick="" href="/admin/staffs/destroy/'.$staff->id.'"><i class="fas fa-trash"></i></a></td>
            </tr>';
            }        

        return $html;
    }
}