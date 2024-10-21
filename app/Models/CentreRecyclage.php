<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CentreRecyclage extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'adresse',
        'image',
        'description',
        'horaire_ouverture',
        'contact',
        'created_at',
        'updated_at',
    ];


    public function dechets()
{
    return $this->hasMany(Dechet::class);
}

}
