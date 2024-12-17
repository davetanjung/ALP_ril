<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Groups_Project extends Model
{
    use HasFactory;

    protected $table = 'groups_projects';
    protected $primaryKey = 'groups_projects_id';

    protected $fillable = [
        'student_id',
        'student_project_id',
    ];

    public function student(): BelongsTo {
        return $this ->belongsTo(Student::class, 'student_id');
    }

    public function student_project(): BelongsTo {
        return $this ->belongsTo(Students_Project::class, 'student_project_id');
    }

}
