<?php

use App\Http\Controllers\LecturerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Models\Project;
use App\Models\Subject;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/student/search', [StudentController::class, 'index'])->name('searchStudent');
Route::get('/student', [StudentController::class, 'getAllStudents'])->name('student');
Route::get('/student/{id}', [StudentController::class, 'getStudentProjects'])->name('studentDetail');


Route::get('/lecturer', [LecturerController::class, 'getAllLecturers'])->name('lecturer');
Route::get('/lecturer/search', [LecturerController::class, 'index'])->name('searchLecturer');



Route::get('/project', [ProjectController::class, 'getAllProjects'])->name('project');
Route::get('/project/{id}', [ProjectController::class, 'getProjectDetail'])->name('projectDetail');

Route::get('/subject', [SubjectController::class, 'getAllSubjects'])->name('subject');
Route::get('/subject/{id}', [SubjectController::class, 'getSubjectProjects'])->name('subjectDetail');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('showLogin');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');

