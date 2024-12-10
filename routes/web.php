<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');


Route::get('/student', [StudentController::class, 'getAllStudents'])->name('student');
Route::get('/student', [StudentController::class, 'searchStudents']);

Route::get('/lecturer', function () {
    return view('lecturer');
})->name('lecturer');

Route::get('/project', function () {
    return view('project');
})->name('project');

Route::get('/subject', function () {
    return view('subject');
})->name('subject');
