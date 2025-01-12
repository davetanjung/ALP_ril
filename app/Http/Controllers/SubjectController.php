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
        $subjects = Subject::paginate(10);
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

    public function index(Request $request, $subjectId)
    {
        $assignmentType = $request->input('assignment_type');

        // Get the subject details
        $subject = Subject::findOrFail($subjectId);

        $projects = Project::whereHas('lecturer_subject', function ($query) use ($subjectId) {
            $query->where('subject_id', $subjectId);
        })
            ->when($assignmentType, function ($query) use ($assignmentType) {
                $query->where('assignment_type', $assignmentType);
            })->with('students_projects') 
            ->get();                   

        return view('subjectDetail', [
            'subject' => $subject,
            'projects' => $projects,
            'selectedType' => $assignmentType, 
        ]);
    }


    public function getSubjectProjects($subjectId)
    {

        $assignmentType = '';
        $projects = Project::whereHas('lecturer_subject', function ($query) use ($subjectId) {
            $query->where('subject_id', $subjectId);
        })->with('students_projects') 
        ->get();       

        $subject = Subject::findOrFail($subjectId);

        return view('subjectDetail', [
            'subject' => $subject,
            'projects' => $projects,
            'selectedType' => $assignmentType, 
        ]);
    }
}
