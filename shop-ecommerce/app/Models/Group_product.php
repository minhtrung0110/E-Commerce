<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group_product extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'created_at',
        'update_at'
    ];
 
}
