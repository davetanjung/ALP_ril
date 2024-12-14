<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    use HasFactory;
    protected $primaryKey = 'student_id';

    protected $fillable = [
        'name',
        'email',
        'nim'
    ];

    public function group_project(): HasMany {
        return $this->hasMany(Groups_Project::class, 'group_project_id');
    }

}
