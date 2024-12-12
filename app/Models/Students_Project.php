<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Students_Project extends Model
{
    use HasFactory;
    protected $table = 'students_projects';

    protected $fillable = [
        'image',
        'status',
        'project_id',
    ];

    public function project(): BelongsTo {
        return $this ->belongsTo(Project::class);
    }
}
