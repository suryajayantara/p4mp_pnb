<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AccreditationController;
use App\Http\Controllers\AccreditationInternationalController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ViewCertificationController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\ViewCertification;
use App\Http\Controllers\ViewDocumentController;
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



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/dashboard', function () {
//     return view('dashboard.index');
// });


Route::get('/certificate', [ViewCertificationController::class, 'indexCertification']);
Route::get('/international', [ViewCertificationController::class, 'indexInternational']);
Route::get('/document', [ViewDocumentController::class, 'indexDocument']);


Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard');

    Route::resource('categories', CategoryController::class);
    Route::resource('posts', PostController::class);
    Route::resource('faculties', FacultyController::class);
    Route::resource('levels', LevelController::class);
    Route::resource('documents', DocumentController::class);
    Route::resource('accreditations', AccreditationController::class);
    Route::resource('results', ResultController::class);
    Route::resource('departements', DepartementController::class);
    Route::resource('accreditation_internationals', AccreditationInternationalController::class);
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
