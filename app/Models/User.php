<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'birth_date' => 'date',
        'password' => 'hashed',
        'role' => UserRole::class    
    ];

    public function courses(): BelongsToMany    {       
        return $this->belongsToMany(Course::class)->withTimestamps();    
    }
}
