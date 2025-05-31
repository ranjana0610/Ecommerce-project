<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $fillable = [
        'user_id',
        'country',
        'email',
        'name',
        'phone',
        'address',
        'city',
        'zip_code',
        'state',
        'delivery_instruction',
    ];
}
