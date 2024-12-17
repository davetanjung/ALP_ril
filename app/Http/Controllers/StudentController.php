<?php

namespace App\Http\Controllers;

use App\Models\Groups_Project;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function getAllStudents()
    {
        $students = Student::all();
        return view('student', [
            'students' => $students,
            'search' => ''
        ]);
    }

    public function index(Request $request)
    {
        $search = $request->input('search', '');

        $students = Student::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%");
        })->get();

        return view('student', [
            'students' => $students,
            'search' => $search
        ]);
    }

    // public function getStudentById($id)
    // {
    //     $student = Student::find($id);

    //     return view('studentDetail', [
    //         'student' => $student
    //     ]);
    // }

    public function getStudentProjects($studentId)
{

    $student = Student::findOrFail($studentId);  

    $groupProjects = Groups_Project::where('student_id', $studentId)
                                    ->with('student_project')  
                                    ->get();
    
    $projects = $groupProjects->map(function ($groupProject) {
        return $groupProject->student_project->project;
    });

    return view('studentDetail', [
        'student' => $student,
        'projects' => $projects
    ]);
}

}
