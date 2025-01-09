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
        'nim',
        'image'
    ];

    public function group_projects(): HasMany
    {
        return $this->hasMany(Groups_Project::class, 'student_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'student_id', 'student_id');
    }
}
