<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class type_reclamations extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function reclamations()
    {
        return $this->hasMany(Reclamation::class, 'type_reclamation_id');
    }
}
