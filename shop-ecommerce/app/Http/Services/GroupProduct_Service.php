<?php
namespace App\Http\Services;
use App\Models\GroupProduct;
class GroupProduct_Service{
    public function getAll(){
        return GroupProduct::all();
    }
}