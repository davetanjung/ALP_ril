<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            'nim' => 'required|string|max:50|unique:students,nim',
            'email' => 'required|email|unique:users,email',
            'name' => 'required|string|max:255|unique:users,name',
            'password' => 'required|string|min:3|confirmed',
            'role' => 'required|in:student,lecturer',
        ]);

        if ($request['role'] === 'student') {

            $student = Student::create([
                'name' => $request->name,
                'email' => $request->email,
                'nim' => $request->nim,
            ]);
        } elseif ($request['role'] === 'lecturer') {
            $student = null;
            $lecturer = Lecturer::create([
                'name' => $request->name,
                'email' => $request->email,                
            ]);
        }

        // Create the user
        $user = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'student_id' => isset($student) ? $student->student_id : null,
        ]);

        return redirect()->route('login');
    }
}
