<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'date_formation',
        'duree',
        'lieu',
        'users_id',
        'image',
        'created_at',
        'updated_at',
    ];

    public function inscription(){
        return $this->hasMany(Inscription::class);
    }
   
    public function user()
    {
        return $this->belongsTo(User::class,'users_id');
    }
}
