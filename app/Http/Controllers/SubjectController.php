<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function getAllSubjects()
    {
        // Retrieve all subjects when first loading the page
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

    // Show Add Subject Form
    public function showAddSubjectForm()
    {
        return view('addSubject'); // Return the Blade file for adding a subject
    }

    // Handle Add Subject Form Submission
    public function storeSubject(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'subject_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Handle the image upload
        $filePath = $request->file('subject_image')->store('uploads', 'public');

        // Create a new subject
        Subject::create([
            'name' => $request->name,
            'subject_image' => 'storage/' . $filePath,
        ]);

        // Redirect back to the Subject page with a success message
        return redirect()->route('subject')->with('success', 'Subject added successfully!');

        
    }
}
