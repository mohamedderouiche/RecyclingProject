<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'formations_id',
        'users_id',
        'date_inscription',
        'statut',
        'created_at',
        'updated_at',
    ];

    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }

   
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
