<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function getAllStudents()
    {
        // Retrieve all students when first loading the page
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
}
