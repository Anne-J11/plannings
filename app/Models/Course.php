<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
     use HasFactory;
     protected $fillable = [ 'planned_date', 'subject_id', 'classroom_id'];

     public function subject(): BelongsTo    {        
          return $this->belongsTo(Course::class);    
     }    
     public function classroom(): BelongsTo    {        
          return $this->belongsTo(Classroom::class);    
     }

     public function users(): BelongsToMany    {        
          return $this->belongsToMany(User::class)->withTimestamps();    
     }
}
