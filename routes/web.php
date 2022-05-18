<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\admin\setup\StudentClassController;
use App\Http\Controllers\admin\setup\StudentYearController;
use App\Http\Controllers\admin\UserController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('auth.login');
});


// dashboard route (admin)
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});

//logout admin router
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');


// User Management Routes
Route::prefix('users')->group(function(){

    Route::get('/view', [UserController::class, 'index'])->name('view.user');
    Route::get('/add', [UserController::class, 'addUserView'])->name('users.add');
    Route::post('/store', [UserController::class, 'StoreUser'])->name('users.store');
    Route::get('/edit/{id}', [UserController::class, 'EditUserView'])->name('users.edit');
    Route::post('/update/{id}', [UserController::class, 'UpdateUser'])->name('users.update');

    Route::get('/delete/{id}', [UserController::class, 'destroy'])->name('users.delete');
});


// User profile management routes
Route::prefix('profile')->group(function(){

    Route::get('/view', [ProfileController::class, 'viewProfile'])->name('profile.view');

    Route::get('/edit', [ProfileController::class, 'profileEdit'])->name('profile.edit');

    Route::post('/store', [ProfileController::class, 'profileStore'])->name('profile.store');

    Route::get('/password/view', [ProfileController::class, 'passwordView'])->name('password.view');
    Route::post('/password/update', [ProfileController::class, 'passwordUpdate'])->name('password.update');
    

});


// Setup student class route
Route::prefix('setup')->group(function(){

    Route::get('/student/class/view', [StudentClassController::class, 'viewStudents'])->name('student.class.view');


    Route::get('/student/class/add', [StudentClassController::class, 'studentClassAdd'])->name('student.class.add');

    Route::post('/student/class/store', [StudentClassController::class, 'storeStudentClass'])->name('store.student.class');

    Route::get('/student/class/edit/{id}', [StudentClassController::class, 'studentClassEditView'])->name('student.class.edit');


    Route::post('/student/class/update/{id}', [StudentClassController::class, 'studentClassUpdate'])->name('update.student.class');

    Route::get('/student/class/delete/{id}', [StudentClassController::class, 'destroy'])->name('student.class.delete');



    // student Year routes
    Route::get('/student/year/view/', [StudentYearController::class, 'viewStudentYear'])->name('student.year.view');


    Route::get('/student/year/add/', [StudentYearController::class, 'studentYearAdd'])->name('student.year.add');


    Route::post('/student/year/store/', [StudentYearController::class, 'studentYearStore'])->name('store.student.year');

    Route::get('/student/year/edit/{id}', [StudentYearController::class, 'studentYearEdit'])->name('student.year.edit');


    Route::post('/student/year/update/{id}', [StudentYearController::class, 'studentYearUpdate'])->name('update.student.year');

    Route::get('/student/year/delete/{id}', [StudentYearController::class, 'destroy'])->name('student.year.delete');


});
