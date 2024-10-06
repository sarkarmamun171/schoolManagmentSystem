<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
//Admin


Route::get('/',[AdminController::class,'index'])->name('admin.login');
Route::post('/admin/authenticate',[AdminController::class,'authenticate'])->name('admin.authenticate');
Route::get('/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
Route::get('/form',[AdminController::class,'form'])->name('admin.form');
Route::get('/table',[AdminController::class,'table'])->name('admin.table');
