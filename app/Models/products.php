<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'categories_id',
        'created_at',
        'updated_at',
    ];

    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
