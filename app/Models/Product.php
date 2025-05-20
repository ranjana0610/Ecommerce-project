<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title',
        'category_id',
        'size',
        'price',
        'description',
        'images',

    ];
    
    protected $casts = [
        'images' => 'array',
    ];

  public function category()
    {
        return $this->belongsTo(Category::class);
    }


}
