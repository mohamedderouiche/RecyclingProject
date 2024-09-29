<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\status_reclamations;
class reclamation extends Model
{
    use HasFactory;
    protected $fillable = [
       'type_reclamation_id',
        'description',
        'image',
        'users_id',
        'status_reclamations_id',
        'created_at',
        'updated_at',
    ];


    public function statusReclamation()
    {
        return $this->belongsTo(status_reclamations::class, 'status_reclamations_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id'); // Adjust the key if necessary
    }
    public function typeReclamation()
    {
        return $this->belongsTo(type_reclamations::class, 'type_reclamation_id');
    }
}
