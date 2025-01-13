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
        'year' => 'required|integer',
        'semester' => 'required|string',
    ]);

    // Handle the image upload
    $filePath = $request->file('subject_image')->store('uploads', 'public');

    // Create a new subject
    $subject = Subject::create([
        'name' => $request->name,
        'subject_image' => 'storage/' . $filePath,
    ]);

    // Link the subject to the lecturer with year and semester
    \DB::table('lecturers_subjects')->insert([
        'lecturer_id' => auth()->user()->lecturer_id, // Assuming the lecturer is authenticated
        'subject_id' => $subject->id,
        'year' => $request->year,
        'semester' => $request->semester,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    // Redirect back to the Subject page with a success message
    return redirect()->route('subject')->with('success', 'Subject added successfully!');
}

}
