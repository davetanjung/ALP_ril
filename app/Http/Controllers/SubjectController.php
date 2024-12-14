<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function getAllSubjects()
    {
        // Retrieve all students when first loading the page
        $subjects = Subject::all();
        return view('subject', [
            'subjects' => $subjects,
        ]);
    }
}
