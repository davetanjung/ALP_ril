<?php

namespace App\Http\Controllers;

use App\Models\Groups_Project;
use App\Models\Project;
use App\Models\Students_Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function getAllProjects()
{
    // Fetch projects with their related students_projects and group_projects
    $projects = Project::with(['students_projects.groupProjects.student'])->paginate(10);

    return view('project', [
        'projects' => $projects,
    ]);
}


    public function getProjectDetail($projectId)
    {
        $projects = Project::findorfail($projectId);

        // get student_project berdasarkan project_id
        $students_project = Students_Project::where('project_id', $projectId)->first();

        // get semua group project berdasarkan student_project_id
        $group_projects = Groups_Project::where('student_project_id', $students_project->student_project_id)->get();

        // di mapping jadi collection untuk mendapatkan data student
        $students = $group_projects->map(function ($groupProject) {
            return $groupProject->student;
        });

        return view('projectDetail', [
            'projects' => $projects,
            'students_project' => $students_project,
            'students' => $students
        ]);
    }
}
