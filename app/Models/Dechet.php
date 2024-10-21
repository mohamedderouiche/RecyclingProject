<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dechet extends Model
{
    use HasFactory;
    protected $fillable = [
        'categorie',
        'quantite',
        'centre_recyclage_id', 
        'created_at',
        'updated_at',
    ];

    public function centreRecyclage()
    {
        return $this->belongsTo(CentreRecyclage::class);
    }

}