<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\CertificationController;
use App\Http\Controllers\ViewCertificationController;
use App\Http\Controllers\CertificationInternationalController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ViewCertification;
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
    return view('dashboard.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/dashboard', function () {
//     return view('dashboard.index');
// });


Route::get('/certificate', [ViewCertificationController::class, 'indexCertification']);
Route::get('/international', [ViewCertificationController::class, 'indexInternational']);


Route::middleware(['auth'])->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('posts', PostController::class);
    Route::resource('faculties', FacultyController::class);
    Route::resource('departements', DepartementController::class);
    Route::resource('certifications', CertificationController::class);
    Route::resource('internationals', CertificationInternationalController::class);
    Route::resource('abouts', AboutController::class);

    Route::get('/sambutan', [AboutController::class, 'sambutan']);
    Route::get('/sambutan/edit/{id}', [AboutController::class, 'editsambutan']);

    Route::get('/sejarah', [AboutController::class, 'sejarah']);
    Route::get('/sejarah/edit/{id}', [AboutController::class, 'editsejarah']);

    Route::get('/visimisi', [AboutController::class, 'visimisi']);
    Route::get('/visimisi/edit/{id}', [AboutController::class, 'editvisimisi']);
});



Route::resource('/', IndexController::class);
Route::resource('detailPosts', IndexController::class);

Route::get('/training', [IndexController::class, 'indextraining']);
Route::get('/about', [AboutController::class, 'indexabout']);
