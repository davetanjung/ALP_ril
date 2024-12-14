<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use Illuminate\Http\Request;

class LecturerController extends Controller
{

    public function getAllLecturers()
    {
        // Retrieve all students when first loading the page
        $lecturers = Lecturer::all();
        return view('lecturer', [
            'lecturers' => $lecturers,
            'search' => ''
        ]);
    }

    public function index(Request $request)
    {
        $search = $request->input('search', '');

        $lecturers = Lecturer::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%");
        })->get();

        return view('lecturer', [
            'lecturers' => $lecturers,
            'search' => $search
        ]);
    }
}
