<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lecturers_Subject extends Model
{
    use HasFactory;
    
    protected $table = 'lecturers_subjects';

    protected $fillable = [
        'year',
        'semester',   
        'lecturer_id',
        'subject_id'
     ];

     public function lecturer(): BelongsTo {
        return $this ->belongsTo(Lecturer::class);
    }

    public function subject(): BelongsTo {
        return $this ->belongsTo(Subject::class);
    }
}
