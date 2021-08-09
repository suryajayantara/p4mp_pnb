<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\DepartementController;
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
    return view('index');
});

Route::get('/news', function () {
    return view('dashboard.faculty.add');
});


Route::get('/academy', function () {
    return view('certificate.academy');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



// Dashboard Route
Route::prefix('dashboard')->group(function () {

    Route::resource('categories', CategoryController::class);
    Route::resource('faculties', FacultyController::class);
    Route::resource('departements', DepartementController::class);
});
