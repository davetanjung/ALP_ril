<?php

namespace App\Http\Controllers;

use App\Models\Groups_Project;
use App\Models\Project;
use App\Models\Lecturers_Subject;
use App\Models\Students_Project;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProjectController extends Controller
{
    use AuthorizesRequests;

    public function getAllProjects()
    {
        $search = '';
        $projects = Project::with(['students_projects.groupProjects.student'])
        ->when($search, function ($query, $search) {
            $query->whereHas('students_projects.groupProjects.student', function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%");
            });
        })
        ->paginate(10);

        
        return view('project', [
            'projects' => $projects,
            'search' => $search,
        ]);
    }

    public function index(Request $request)
    {
        // $userId = Auth::id(); 
        $search = $request->input('search', '');

        $projects = Project::with(['students_projects.groupProjects.student'])
        ->when($search, function ($query, $search) {
            $query->whereHas('students_projects.groupProjects.student', function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%");
            });
        })
        ->paginate(10);

        return view('project', [
            'projects' => $projects,
            'search' => $search,
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

        $filePath = $request->file('image')->store('uploads', 'public');

        $project = Project::create([
            'title' => $request->title,
            'description' => $request->description,
            'assignment_type' => $request->assignment_type,
            'lecturer_subject_id' => $request->lecturer_subject_id,
            'image' => $filePath,
        ]);

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

    public function update(Request $request, Project $project)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'assignment_type' => 'required|string',
            'lecturer_subject_id' => 'required|exists:lecturers_subjects,lecturer_subject_id',
            'students' => 'required|array',
            'students.*' => 'exists:students,student_id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
    
        // Handle image upload if a new image is provided
        $imagePath = $project->image; // Keep existing image by default
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('project_images', 'public');
        }
    
        // Update project details
        $project->update([
            'title' => $request->title,
            'description' => $request->description,
            'assignment_type' => $request->assignment_type,
            'lecturer_subject_id' => $request->lecturer_subject_id,
            'image' => $imagePath,
        ]);
    
        // Find or create the student project
        $studentProject = Students_Project::firstOrCreate(
            ['project_id' => $project->project_id],
            ['status' => 'Pending']
        );
    
        // Update student project image if there's a new image
        if ($request->hasFile('image')) {
            $studentProject->update([
                'image' => $imagePath
            ]);
        }
    
        // Delete existing group projects
        Groups_Project::where('student_project_id', $studentProject->student_project_id)->delete();
    
        // Create new group projects for selected students
        foreach ($request->students as $studentId) {
            Groups_Project::create([
                'student_project_id' => $studentProject->student_project_id,
                'student_id' => $studentId
            ]);
        }
    
        return redirect()->route('getAllProjects')->with('success', 'Project updated successfully!');
    }

    public function edit(Project $project)
{

        $allStudents = Student::all();
        
        // Get the student project for this project
        $students_project = Students_Project::where('project_id', $project->project_id)->firstOrFail();
        
        // Get all group projects for this student project
        $group_projects = Groups_Project::where('student_project_id', $students_project->student_project_id)->get();
        
        // Get currently selected students
        $selectedStudents = $group_projects->map(function ($groupProject) {
            return $groupProject->student;
        });
        
        // Get all subjects for the dropdown
        $subjects = Lecturers_Subject::with('subject')->get();

        return view('updateProject', [
            'project' => $project,
            'subjects' => $subjects,
            'allStudents' => $allStudents,         // All available students
            'selectedStudents' => $selectedStudents // Currently selected students
        ]);
}
}
