<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lecturers_Subject extends Model
{
    use HasFactory;

    protected $table = 'lecturers_subjects';
    protected $primaryKey = 'lecturer_subject_id';

    protected $fillable = [
        'year',
        'semester',
        'lecturer_id',
        'subject_id',
        'project_id'
    ];

    public function lecturer(): BelongsTo
    {
        return $this->belongsTo(Lecturer::class);
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function project()
    {
        return $this->hasMany(Project::class, 'lecturer_subject_id');
    }
    
}
