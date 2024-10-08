<?php

use App\Http\Controllers\AcademicYearController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\FeeHeadContoller;
use App\Http\Controllers\FeeStructureController;
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

        //Class
        Route::get('/add-class',[ClassesController::class,'add_class'])->name('admin.add.class');
        Route::post('/add-class/store',[ClassesController::class,'store_class'])->name('admin.class.store');
        Route::get('/add-class/list',[ClassesController::class,'class_list'])->name('admin.class.list');
        Route::get('/add-class/edit/{id}',[ClassesController::class,'class_edit'])->name('admin.class.edit');
        Route::post('/add-class/update/{id}',[ClassesController::class,'class_update'])->name('admin.class.update');
        Route::get('/add-class/delete/{id}',[ClassesController::class,'class_delete'])->name('admin.class.delete');

        //Fee Head
        Route::get('/feehead/add',[FeeHeadContoller::class,'feehead_add'])->name('fee.head.add');
        Route::post('/feehead/store',[FeeHeadContoller::class,'feehead_store'])->name('fee.head.store');
        Route::get('/feehead/list',[FeeHeadContoller::class,'feehead_list'])->name('fee.head.list');
        Route::get('/feehead/edit/{id}',[FeeHeadContoller::class,'feehead_edit'])->name('fee.head.edit');
        Route::post('/feehead/update/{id}',[FeeHeadContoller::class,'feehead_update'])->name('fee.head.update');
        Route::get('/feehead/delete/{id}',[FeeHeadContoller::class,'feehead_delete'])->name('fee.head.delete');

        //Fee Structure
        Route::get('/fee-structure/add',[FeeStructureController::class,'fee_str_add'])->name('fee.str.add');
    });
// });
