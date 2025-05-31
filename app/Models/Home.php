<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
     protected $fillable = [
        'image_1',
        'image_2',
        'image_3',
        'image_4',
        'image_5',
        'title',
        'description',
    ];
}
