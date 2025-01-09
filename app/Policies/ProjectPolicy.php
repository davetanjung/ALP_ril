<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\User;

class ProjectPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, Project $project)
    {
        // Check if the user's role is 'student'
        if ($user->role !== 'student') {
            return false;
        }

        // Check if the project is associated with the student
        return $project->students_projects->contains(function ($studentsProject) use ($user) {
            return $studentsProject->groupProjects->contains('student_id', $user->student_id);
        });
    }
}
