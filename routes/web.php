<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\AccreditationController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/dashboard', function () {
    return view('dashboard.faculty.add');
});


Route::get('/academy', function () {
    return view('certificate.academy');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/dashboard', function () {
//     return view('dashboard.index');
// });


Route::resource('categories', CategoryController::class)->middleware('auth');
Route::resource('posts', PostController::class)->middleware('auth');
Route::resource('faculties', FacultyController::class);
Route::resource('departements', DepartementController::class);
Route::resource('accreditations', AccreditationController::class);
Route::resource('/', IndexController::class);
Route::resource('detailPosts', IndexController::class);

Route::resource('about', AboutController::class)->middleware('auth');
Route::get('/sambutan', [AboutController::class,'sambutan'])->middleware('auth');
Route::get('/sambutan/edit/{id}', [AboutController::class,'editsambutan'])->middleware('auth');
Route::get('/sejarah', [AboutController::class,'sejarah'])->middleware('auth');
Route::get('/sejarah/edit/{id}', [AboutController::class,'editsejarah'])->middleware('auth');
Route::get('/visimisi', [AboutController::class,'visimisi'])->middleware('auth');
Route::get('/visimisi/edit/{id}', [AboutController::class,'editvisimisi'])->middleware('auth');

Route::get('/training', [IndexController::class,'indextraining']);

