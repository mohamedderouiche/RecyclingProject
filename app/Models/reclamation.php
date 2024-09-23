<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reclamation extends Model
{
    use HasFactory;
    protected $fillable = [
        'typeReclamation',
        'description',
        'image',
        'users_id',
        'status_reclamations_id',
        'created_at',
        'updated_at',
    ];

    
    public function status_reclamations()
    {
        return $this->belongsTo(Status_reclamations::class);
    }
    
}
