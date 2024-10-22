<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'formations_id',
        'nom',
        'prenom',
        'email',
        'date_inscription',
        'statut',
        'created_at',
        'updated_at',
    ];

 

    public function formation()
{
    return $this->belongsTo(Formation::class, 'formations_id'); // Use 'formations_id' to match the foreign key
}


public function user()
{
    return $this->belongsTo(User::class, 'users_id');
}

}
