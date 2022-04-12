<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('/show-form',[App\HTTP\Controllers\CustomerController::class, 'create'])->name('showForm');
Route::post('/add-data',[App\HTTP\Controllers\CustomerController::class, 'store'])->name('addData');
Route::get('/view-data',[App\HTTP\Controllers\CustomerController::class, 'show'])->name('viewData');
Route::get('/view-status/{id}',[App\HTTP\Controllers\CustomerController::class, 'viewStatus'])->name('viewStatus');
Route::get('/view-role/{id}',[App\HTTP\Controllers\CustomerController::class, 'viewRole'])->name('viewRole');
Route::POST('/update-status',[App\HTTP\Controllers\CustomerController::class, 'updateStatus'])->name('updateStatus');
Route::POST('/update-role',[App\HTTP\Controllers\CustomerController::class, 'updateRole'])->name('updateRole');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

