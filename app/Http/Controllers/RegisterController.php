<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'name' => 'required|string|max:255|unique:users,name',
            'password' => 'required|string|min:3|confirmed',
            'role' => 'required|in:student,lecturer',
            'nim' => 'required_if:role,student',
            'uniqueCode' => [
                'required_if:role,lecturer',
                'string',
                Rule::exists('lecturers')->where(function ($query) use ($request) {
                    $query->where('uniqueCode', $request->uniqueCode);
                }),
            ],
        ]);

        $student = null;
        $lecturer = null;

        if ($request['role'] === 'student') {
            $student = Student::create([
                'name' => $request->name,
                'email' => $request->email,
                'nim' => $request->nim,
            ]);
        } 
        if ($request['role'] === 'lecturer') {
            $student = null;
            $lecturer = Lecturer::create([
                'name' => $request->name,
                'email' => $request->email,
                'uniqueCode' => $request->uniqueCode,
            ]);
        }

        // Create the user
        $user = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'student_id' => isset($student) ? $student->student_id : null,
            'lecturer_id' => isset($lecturer) ? $lecturer->id : null,
        ]);

        return redirect()->route('login');
    }
}
