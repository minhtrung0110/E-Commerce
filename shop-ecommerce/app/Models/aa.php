<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'role_id',
        'first_name',
        'last_name',
        'phone',
        'email',
        'password',
        'status',
        'address',
        'start_date',
        'end_date',
    ];
    public function orders(){

    }
    public function roles(){

    }
}
