<?php

namespace App\Models;

use Database\Seeders\Groups_ProjectSeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Students_Project extends Model
{
    use HasFactory;
    protected $table = 'students_projects';
    protected $primaryKey = 'student_project_id';


    protected $fillable = [
        'image',
        'status',
        'project_id',
    ];

    public function project(): BelongsTo {
        return $this ->belongsTo(Project::class, 'project_id');
    }

    public function groupProjects()
    {
        return $this->hasMany(Groups_Project::class, 'student_project_id');
    }
    
}
