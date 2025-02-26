<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\ClassroomController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('students.index');
});

Route::resource('students', StudentController::class);
Route::resource('grades', GradeController::class);
Route::resource('classrooms', ClassroomController::class);
