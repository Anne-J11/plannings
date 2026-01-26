<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory; 
    protected $fillable = [ 'name', 'has_computer' ]; 
    protected $casts = [ 'has_computer' => 'boolean', ];

    public function courses(): HasMany    {        
        return $this->hasMany(Course::class);    
    } 
}
