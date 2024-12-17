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
    // Eager load lecturer_subject and projects
    $subject = Subject::with('lecturer_subject.project')->findOrFail($subjectId);

    // Check if lecturer_subject is populated
    if (!$subject->lecturer_subject->isEmpty()) {
        dd($subject->lecturer_subject); // Check this to confirm what’s being loaded
    }

    // Proceed to process projects
    $projects = $subject->lecturer_subject->flatMap(function ($lecturerSubject) {
        return $lecturerSubject->projects;
    });

    // Return the data to the view
    return view('subjectDetail', [
        'subject' => $subject,
        'projects' => $projects
    ]);
}

    

}
