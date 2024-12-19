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
        $projects = Project::with('students_projects') 
            ->whereHas('students_projects', function ($query) {               
                $query->whereIn('status', ['good', 'normal']);
            })
            ->paginate(10);

            

            return view('project', [
                'projects' => $projects,
            ]);
    }

    public function getProjectDetail($projectId){
        $projects = Project::findorfail($projectId);       
        
        $students_project = Students_Project::where('project_id', $projectId)->first();

        $group_projects = Groups_Project::where('student_project_id', $students_project->student_project_id)->get();

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
