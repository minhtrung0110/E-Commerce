<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Product_detail extends Model
{
    use HasFactory;
    protected $fillable=[
        'product_id',
        'code_color',
        'amount',
        'price',
        'created_at',
        'update_at'
    ];
    public function product(){
        return $this->hasOne(Product::class,'id','product_id');
    }
}
