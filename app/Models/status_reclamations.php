<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class status_reclamations extends Model
{
    use HasFactory;

    protected $fillable = [
        'status_reclamation',
        'description',
        'created_at',
        'updated_at',
    ];

    public function reclamation()
    {
        return $this->hasMany(Reclamation::class);
    }

   
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
