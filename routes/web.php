<?php

use App\Http\Controllers\LecturerController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/student/search', [StudentController::class, 'index'])->name('searchStudent');
Route::get('/student', [StudentController::class, 'getAllStudents'])->name('student');

Route::get('/lecturer', [LecturerController::class, 'getAllLecturers'])->name('lecturer');


Route::get('/project', function () {
    return view('project');
})->name('project');

Route::get('/subject', function () {
    return view('subject');
})->name('subject');
