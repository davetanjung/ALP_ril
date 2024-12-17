<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function getAllSubjects()
    {
        // Retrieve all students when first loading the page
        $subjects = Subject::all();
        return view('subject', [
            'subjects' => $subjects,
        ]);
    }

       public function getSubjectById($id)
    {
        $subject = Subject::find($id);

        return view('subjectDetail', [
            'subject' => $subject
        ]);
    }

    public function getSubjectProjects($subjectId)
    {
        $projects = Project::whereHas('lecturer_subject', function ($query) use ($subjectId) {
            $query->where('subject_id', $subjectId);
        })->get();

        $subject = Subject::findOrFail($subjectId);
    
        return view('subjectDetail', [
            'subject' => $subject,
            'projects' => $projects,
        ]);
    }    
    

}
