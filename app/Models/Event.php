<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'type_events_id',
        'created_at',
        'updated_at',
    ];

    
    // public function typeEvent()
    // {
    //     return $this->belongsTo(TypeEvent::class);
    // }
    public function TypeEvent()
    {
        return $this->belongsTo(TypeEvent::class, 'type_events_id');
    }
}
