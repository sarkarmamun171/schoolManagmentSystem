<?php

use App\Http\Controllers\AcademicYearController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
//Admin

// Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => 'admin.guest'], function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.login');
        Route::get('/register', [AdminController::class, 'register'])->name('admin.register');
        Route::post('/authenticate', [AdminController::class, 'authenticate'])->name('admin.authenticate');
    });
    Route::group(['middleware' => 'admin.auth'], function () {
        Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/form', [AdminController::class, 'form'])->name('admin.form');
        Route::get('/table', [AdminController::class, 'table'])->name('admin.table');
        //Academic Year
        Route::get('/academic-year',[AcademicYearController::class,'index'])->name('academicyear.index');
        Route::post('/academic-year/store',[AcademicYearController::class,'store'])->name('academicyear.store');
        Route::get('/academic-year/list',[AcademicYearController::class,'list'])->name('academicyear.list');
        Route::get('/academic-year/edit/{id}',[AcademicYearController::class,'edit'])->name('academicyear.edit');
        Route::post('/academic-year/update/{id}',[AcademicYearController::class,'update'])->name('academicyear.update');

    });
// });
