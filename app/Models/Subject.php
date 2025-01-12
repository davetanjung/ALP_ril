<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'subject_image',
     ];

     public function lecturer_subject()
     {
         return $this->hasMany(Lecturers_Subject::class, 'subject_id');
     }     
    
}
