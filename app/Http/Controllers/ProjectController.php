<?php

namespace App\Http\Controllers;

use App\Models\Groups_Project;
use App\Models\Project;
use App\Models\Lecturers_Subject;
use App\Models\Students_Project;
use Illuminate\Http\Request;
use App\Models\Student;


class ProjectController extends Controller
{
    public function getAllProjects()
    {
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

    public function showUploadProjectPage()
    {
        $subjects = Lecturers_Subject::with('subject')->get();
        $students = Student::all(); // Fetch all students for the dropdown
    
        return view('uploadProject', [
            'subjects' => $subjects,
            'students' => $students,
        ]);
    }
    

    public function storeProjectUpload(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'assignment_type' => 'required|string',
            'lecturer_subject_id' => 'required|exists:lecturers_subjects,lecturer_subject_id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'students' => 'nullable|array', // Validate students input
            'students.*' => 'exists:students,student_id', // Ensure students are valid
        ]);
    
        // Store the uploaded image
        $filePath = $request->file('image')->store('uploads', 'public');
    
        // Create the project
        $project = Project::create([
            'title' => $request->title,
            'description' => $request->description,
            'assignment_type' => $request->assignment_type,
            'lecturer_subject_id' => $request->lecturer_subject_id,
            'image' => $filePath,
        ]);
    
        // Create a student project
        $studentProject = Students_Project::create([
            'project_id' => $project->project_id,
            'image' => $filePath,
            'status' => 'Pending',
        ]);
    
        // Add selected students to the group project
        if ($request->has('students')) {
            foreach ($request->students as $studentId) {
                Groups_Project::create([
                    'student_project_id' => $studentProject->student_project_id,
                    'student_id' => $studentId,
                ]);
            }
        }
    
        return redirect()->route('getAllProjects')->with('success', 'Project uploaded successfully!');
    }
    
    

}
