<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'contenu',
        'image',
        'users_id',
        'created_at',
        'updated_at',
    ];

    public function comments()
    {
        return $this->hasMany(Comments::class);
    }

   
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
