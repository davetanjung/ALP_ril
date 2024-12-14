<?php

use App\Http\Controllers\LecturerController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Models\Subject;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/student/search', [StudentController::class, 'index'])->name('searchStudent');
Route::get('/student', [StudentController::class, 'getAllStudents'])->name('student');
Route::get('/student/{id}', [StudentController::class, 'getStudentById'])->name('studentDetail');

Route::get('/lecturer', [LecturerController::class, 'getAllLecturers'])->name('lecturer');
Route::get('/lecturer/search', [LecturerController::class, 'index'])->name('searchLecturer');

Route::get('/project', function () {
    return view('project');
})->name('project');

Route::get('/subject', [SubjectController::class, 'getAllSubjects'])->name('subject');
