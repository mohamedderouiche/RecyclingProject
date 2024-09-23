<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function typeEvent(){
        return $this->hasMany(TypeEvent::class);
    }
    public function article(){
        return $this->hasMany(Article::class);
    }
    public function comments(){
        return $this->hasMany(Comments::class);
    }
    public function status_reclamations(){
        return $this->hasMany(Status_reclamations::class);
    }
    public function formation(){
        return $this->hasMany(Formation::class);
    }
    public function inscription(){
        return $this->hasMany(Inscription::class);
    }
}
