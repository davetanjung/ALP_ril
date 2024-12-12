<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use Illuminate\Http\Request;

class LecturerController extends Controller
{
    public function getAllLecturers()
    {
        $lecturers = Lecturer::all();
        return view('lecturer', ['lecturers' => $lecturers]);
    }
}
