<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StudentController;
use App\Http\Controllers\courseController;
use App\Http\Controllers\StudentCourseController;
use App\Http\Controllers\UserController;



Route::get('register',[UserController::class,'create']);
Route::post('register',[UserController::class,'store']);
Route::any('login',[UserController::class,'login'])->name('login');

Route::group(['middleware' => 'loginValidatorMiddleware'],function(){ //creating  route group
Route::get('logout',[UserController::class,'logout']);


Route::get('', function () {
    return view('index');
});

Route::any('add-student',[StudentController::class,'create'])->name('addStudent');
Route::any('display-student',[StudentController::class,'index'])->name('displayStudent');
Route::any('edit-student/{id}',[StudentController::class,'edit']);
Route::get('delete-student/{id}',[StudentController::class,'destroy']);
Route::get('view-student/{id}',[StudentController::class,'show']);
Route::any('student/toggleStatus',[StudentController::class,'toggleStatus']);
Route::any('add-course',[courseController::class,'create']);
Route::any('display-course',[courseController::class,'index']);
Route::any('edit-course/{id}',[courseController::class,'edit']);
Route::any('delete-course/{id}',[courseController::class,'destroy']);
Route::get('view-course/{id}',[courseController::class,'show']);
// Route::resources('student_courses',StudentCourseController::class);

Route::get('add-student-course',[StudentCourseController::class,'create'])->name('addstudentcourse');
Route::post('add-student-course',[StudentCourseController::class,'store'])->name('storestudentcourse');
Route::any('display-student-course',[StudentCourseController::class,'index'])->name('displaystudentcourse');
Route::get('edit-student-course/{id}',[StudentCourseController::class,'edit'])->name('editstudentcourse');
Route::post('/update-student-course',[StudentCourseController::class,'update'])->name('updatestudentcourse');
Route::any('delete-student-course/{id}',[StudentCourseController::class,'destroy'])->name('deletestudentcourse');
});
