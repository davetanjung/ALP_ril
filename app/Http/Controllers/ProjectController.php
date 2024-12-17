<?php

namespace App\Http\Controllers;

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
            ->get();

            return view('project', [
                'projects' => $projects
            ]);
    }

    public function getProjectDetail($projectId){
        $projects = Project::findorfail($projectId);

        return view('projectDetail', [
            'projects' => $projects
        ]);
    }
}
