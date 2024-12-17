<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    use HasFactory;
    protected $primaryKey = 'project_id';
    
    protected $fillable = [
        'title',
        'description',
        'assignment_type',
        'lecturer_subject_id'
    ];

    public function lecturer_subject(): BelongsTo {
        return $this ->belongsTo(Lecturers_Subject::class, 'lecturer_subject_id');
    }

}
