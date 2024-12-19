<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use App\Models\Lecturers_Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LecturerController extends Controller
{

    public function getAllLecturers()
    {
        // $userId = Auth::id(); 
        // Retrieve all students when first loading the page
        $lecturers = Lecturer::all();
        return view('lecturer', [
            'lecturers' => $lecturers,
            'search' => '',
            // 'userId' => $userId
        ]);
    }

    public function index(Request $request)
    {
        // $userId = Auth::id(); 
        $search = $request->input('search', '');

        $lecturers = Lecturer::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%");
        })->get();

        return view('lecturer', [
            'lecturers' => $lecturers,
            'search' => $search,
            // 'userId' => $userId
        ]);
    }

    public function getLecturerSubjects($lecturer_id)
    // public function getLecturerSubjects($userId, $lecturer_id)
    {
        $lecturer = Lecturer::find($lecturer_id);
    
        $lecturer_subject = Lecturers_Subject::where('lecturer_id', $lecturer_id)
                                        ->with('subject')  
                                        ->get();
        
        $subjects = $lecturer_subject->map(function ($lecturer_subject) {
            return $lecturer_subject->subject;
        });
    
        return view('lecturerDetail', [
            'lecturer' => $lecturer,
            'lecturer_subject' => $lecturer_subject,
            'subjects' => $subjects,
            // 'userId' => $userId
        ]);
    }

}
