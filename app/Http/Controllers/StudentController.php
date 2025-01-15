<?php

namespace App\Http\Controllers;

use App\Models\Groups_Project;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{

    public function getAllStudents()
    {

        // $userId = Auth::id(); 

        $search = '';
        $students = Student::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%");
        })->paginate(10);

        return view('student', [
            'students' => $students,
            'search' => '',
            // 'userId' => $userId
        ]);
    }

    public function index(Request $request)
    {
        // $userId = Auth::id(); 
        $search = $request->input('search', '');

        $students = Student::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%");
        })->paginate(10);

        return view('student', [
            'students' => $students,
            'search' => $search,
            // 'userId' => $userId
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
        // $userId = Auth::id(); 
        $student = Student::findOrFail($studentId);

        $groupProjects = Groups_Project::where('student_id', $studentId)
            ->with('student_project')
            ->get();

        $studentProjects = $groupProjects->map(function ($groupProject) {
            return $groupProject->student_project;
        });

        $projects = $groupProjects->map(function ($groupProject) {
            return $groupProject->student_project->project;
        });

        return view('studentDetail', [
            'student' => $student,
            'projects' => $projects,
            'studentProjects' => $studentProjects
            // 'userId' => $userId
        ]);
    }

    public function showCreateStudentPage()
    {
        // $students = Student::all();

        return view('createStudent', [
            // 'students' => $students,
        ]);
    }
}
