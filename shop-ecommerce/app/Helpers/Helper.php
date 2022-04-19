<?php
namespace App\Helpers;
use Illuminate\Support\Str;
class Helper{
        
    public static function active($active = 0): string
    {
        return $active == 0 ? '<span class="btn btn-danger btn-xs">NO</span>'
            : '<span class="btn btn-success btn-xs">YES</span>';
    }
}