<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Middleware\UserPathMiddleware;
use App\Models\Project;
use App\Models\Student;
use App\Models\Subject;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::middleware(['auth', UserPathMiddleware::class])->group(function () {
    Route::get('/user/{userId}/profile', [HomeController::class, 'profile'])->name('profile');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('editProject');   
    Route::put('/projects/{project}/update', [ProjectController::class, 'update'])->name('updateProject');
});

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/student', [StudentController::class, 'getAllStudents'])->name('student');
Route::get('/student/create', [StudentController::class, 'showCreateStudentPage'])->name('createStudentPage');
Route::post('/student/create', [StudentController::class, 'createStudent'])->name('createStudent');
Route::get('/student/search', [StudentController::class, 'index'])->name('searchStudent');
Route::get('/student/{id}', [StudentController::class, 'getStudentProjects'])->name('studentDetail');

Route::get('/lecturer', [LecturerController::class, 'getAllLecturers'])->name('lecturer');
Route::get('/lecturer/search', [LecturerController::class, 'index'])->name('searchLecturer');
Route::get('/lecturer/{id}', [LecturerController::class, 'getLecturerSubjects'])->name('lecturerDetail');


Route::get('/project', [ProjectController::class, 'getAllProjects'])->name('project');
Route::get('/projects', [ProjectController::class, 'getAllProjects'])->name('getAllProjects');
Route::get('/projects/upload', [ProjectController::class, 'showUploadProjectPage'])->name('uploadProjectPage');
Route::get('/projects/search', [ProjectController::class, 'index'])->name('searchProject');
Route::get('/projects/{subject}', [SubjectController::class, 'index'])->name('subjectProjects');
Route::post('/projects/upload', [ProjectController::class, 'storeProjectUpload'])->name('storeProjectUpload'); 
Route::get('/project/{id}', [ProjectController::class, 'getProjectDetail'])->name('projectDetail');


Route::get('/subject', [SubjectController::class, 'getAllSubjects'])->name('subject');
Route::get('/subject/{id}', [SubjectController::class, 'getSubjectProjects'])->name('subjectDetail');

Route::get('/register', [RegisterController::class, 'showRegistrationForm']);
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('showLogin');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');

Route::get('/credit', function () {
    return view('credit');
})->name('credit');


Route::post('/profile/update-image', [UserController::class, 'updateProfileImage'])->name('updateProfileImage');

Route::get('/subjects/add', [SubjectController::class, 'showAddSubjectForm'])->name('addSubjectForm');
Route::post('/subjects/add', [SubjectController::class, 'storeSubject'])->name('storeSubject');

Route::post('/projects/{project}/score', [ProjectController::class, 'giveScore'])->name('giveScore');


