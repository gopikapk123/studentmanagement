<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout');
});

Route::get('/managestudents',[App\Http\Controllers\StudentController::class,'index']);
Route::get('/managestudents/create',[App\Http\Controllers\StudentController::class,'create'])->name('create');
Route::post('/managestudents/store',[App\Http\Controllers\StudentController::class,'store'])->name('store');
Route::post('/managestudents/delete/{id}',[App\Http\Controllers\StudentController::class,'destroy']);
Route::get('/managestudents/edit/{id}',[App\Http\Controllers\StudentController::class,'edit'])->name('edit');
Route::post('/managestudents/update/{id}',[App\Http\Controllers\StudentController::class,'update'])->name('update');
//Export
Route::get('/managestudents/export',[App\Http\Controllers\StudentController::class,'export'])->name('export');

// Course

Route::get('/managecourse',[App\Http\Controllers\CourseController::class,'index']);
Route::get('/managecourse/create',[App\Http\Controllers\CourseController::class,'create'])->name('create');
Route::post('/managecourse/store',[App\Http\Controllers\CourseController::class,'store'])->name('store');


// batch

Route::get('/managebatch',[App\Http\Controllers\BatchController::class,'index']);
Route::get('/managebatch/create',[App\Http\Controllers\BatchController::class,'create'])->name('create');
Route::post('/managebatch/store',[App\Http\Controllers\BatchController::class,'store'])->name('store');


//Payment and reciept

Route::get('/managepayment',[App\Http\Controllers\PaymentController::class,'index'])->name('index');
Route::post('/payment/pay',[App\Http\Controllers\PaymentController::class,'store'])->name('store');
Route::post('/payment/success',[App\Http\Controllers\PaymentController::class,'success'])->name('success');
Route::get('/payment/receipt/{id}',[App\Http\Controllers\PaymentController::class,'receipt'])->name('receipt');

