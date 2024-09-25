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

    public function reclamations()
    {
        return $this->hasMany(Reclamation::class, 'status_reclamations_id');
    }

    public function user() // Define the relationship to the User model
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
