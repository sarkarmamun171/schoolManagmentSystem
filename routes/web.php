<?php

use App\Http\Controllers\AcademicYearController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AssignSubjectToClassController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\FeeHeadContoller;
use App\Http\Controllers\FeeStructureController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
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
    Route::get('/academic-year', [AcademicYearController::class, 'index'])->name('academicyear.index');
    Route::post('/academic-year/store', [AcademicYearController::class, 'store'])->name('academicyear.store');
    Route::get('/academic-year/list', [AcademicYearController::class, 'list'])->name('academicyear.list');
    Route::get('/academic-year/edit/{id}', [AcademicYearController::class, 'edit'])->name('academicyear.edit');
    Route::post('/academic-year/update/{id}', [AcademicYearController::class, 'update'])->name('academicyear.update');

    //Class
    Route::get('/add-class', [ClassesController::class, 'add_class'])->name('admin.add.class');
    Route::post('/add-class/store', [ClassesController::class, 'store_class'])->name('admin.class.store');
    Route::get('/add-class/list', [ClassesController::class, 'class_list'])->name('admin.class.list');
    Route::get('/add-class/edit/{id}', [ClassesController::class, 'class_edit'])->name('admin.class.edit');
    Route::post('/add-class/update/{id}', [ClassesController::class, 'class_update'])->name('admin.class.update');
    Route::get('/add-class/delete/{id}', [ClassesController::class, 'class_delete'])->name('admin.class.delete');

    //Fee Head
    Route::get('/feehead/add', [FeeHeadContoller::class, 'feehead_add'])->name('fee.head.add');
    Route::post('/feehead/store', [FeeHeadContoller::class, 'feehead_store'])->name('fee.head.store');
    Route::get('/feehead/list', [FeeHeadContoller::class, 'feehead_list'])->name('fee.head.list');
    Route::get('/feehead/edit/{id}', [FeeHeadContoller::class, 'feehead_edit'])->name('fee.head.edit');
    Route::post('/feehead/update/{id}', [FeeHeadContoller::class, 'feehead_update'])->name('fee.head.update');
    Route::get('/feehead/delete/{id}', [FeeHeadContoller::class, 'feehead_delete'])->name('fee.head.delete');

    //Fee Structure
    Route::get('/fee-structure/add', [FeeStructureController::class, 'fee_str_add'])->name('fee.str.add');
    Route::post('/fee-structure/store', [FeeStructureController::class, 'fee_str_store'])->name('fee.str.store');
    Route::get('/fee-structure/list', [FeeStructureController::class, 'fee_str_list'])->name('fee.str.list');
    Route::get('/fee-structure/edit/{id}', [FeeStructureController::class, 'fee_str_edit'])->name('fee.str.edit');
    Route::post('/fee-structure/update/{id}', [FeeStructureController::class, 'fee_str_update'])->name('fee.str.update');
    Route::get('/fee-structure/delete/{id}', [FeeStructureController::class, 'fee_str_delete'])->name('fee.str.delete');

    //Student Managment
    Route::get('/student/add',[StudentController::class,'add_student'])->name('add.student');
    Route::post('/student/store',[StudentController::class,'store_student'])->name('store.student');
    Route::get('/student/list',[StudentController::class,'list_student'])->name('list.student');
    Route::get('/student/edit/{id}',[StudentController::class,'edit_student'])->name('edit.student');
    Route::post('/student/update/{id}',[StudentController::class,'update_student'])->name('update.student');
    Route::get('/student/delete/{id}',[StudentController::class,'delete_student'])->name('delete.student');

    //Announcement Managment
    Route::get('/announcement/index',[AnnouncementController::class,'index'])->name('announcement.index');
    Route::post('/announcement/store',[AnnouncementController::class,'store'])->name('announcement.store');
    Route::get('/announcement/show',[AnnouncementController::class,'show'])->name('announcement.show');
    Route::get('/announcement/edit/{id}',[AnnouncementController::class,'edit'])->name('announcement.edit');
    Route::post('/announcement/update/{id}',[AnnouncementController::class,'update'])->name('announcement.update');
    Route::get('/announcement/destroy/{id}',[AnnouncementController::class,'destroy'])->name('announcement.destroy');

    //Subject Management
    Route::get('subject/index',[SubjectController::class,'index'])->name('subject.index');
    Route::post('subject/store',[SubjectController::class,'store'])->name('subject.store');
    Route::get('subject/show',[SubjectController::class,'show'])->name('subject.show');
    Route::get('subject/edit/{id}',[SubjectController::class,'edit'])->name('subject.edit');
    Route::post('subject/update/{id}',[SubjectController::class,'update'])->name('subject.update');
    Route::get('subject/destroy/{id}',[SubjectController::class,'destroy'])->name('subject.destroy');

    //Assign Subject To Class
    Route::get('assign-subject/index',[AssignSubjectToClassController::class,'index'])->name('assign.index');
    Route::post('assign-subject/store',[AssignSubjectToClassController::class,'store'])->name('assign.store');
});
// });
 //Student Login
Route::group(['prefix'=>'student'],function(){
    //guest
    Route::group(['middleware'=>'guest'],function(){
        Route::get('/login',[StudentController::class,'student_login'])->name('student.login');
        Route::post('/authenticate',[StudentController::class,'student_authenticate'])->name('student.authenticate');
    });
    //Auth
    Route::group(['middleware'=>'auth'],function(){
        Route::get('/dashboard',[StudentController::class,'student_dashboard'])->name('student.dashboard');
        Route::get('/logout',[StudentController::class,'student_logout'])->name('student.logout');
        Route::get('/changepassword',[StudentController::class,'student_changepassword'])->name('student.changepassword');
        Route::get('/update-password',[StudentController::class,'student_updatepassword'])->name('student.updatepassword');
    });
});
