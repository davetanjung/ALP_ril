<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function student()
    {
        return view('student', []);
    }


    public function index(Request $request)
{
    $searchTerm = $request->input('search');

    $students = Student::when($searchTerm, function ($query, $searchTerm) {
        $query->where('name', 'like', '%' . $searchTerm . '%');
    })->get();

    return view('student', ['students' => $students]);
}

    public function getAllStudents()
    {
        $students = Student::all();
        return view('student', ['students' => $students]);
    }
}
