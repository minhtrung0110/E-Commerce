<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
class Image_product extends Model
{
    use HasFactory;
    protected $fillable=[
        'product_id',
        'created_at',
        'update_at'
    ];
    public function product(){
        return $this->hasMany(Product::class,'id','product_id');
    }
}
