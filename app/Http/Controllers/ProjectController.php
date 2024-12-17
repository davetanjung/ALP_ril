<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
     public function getAllProjects()
    {
        $projects = Project::all();

        return view('project', [
            'projects' => $projects
        ]);
    }
}
