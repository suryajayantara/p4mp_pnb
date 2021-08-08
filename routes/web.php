<?php

use App\Http\Controllers\CategoryController;
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
    return view('indexxxxxxx');
});

Route::get('/news', function () {
    return view('news.index');
});


Route::get('/academy', function () {
    return view('certificate.academy');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



// Dashboard Route
Route::prefix('dashboard')->group(function () {

    Route::resource('categories', CategoryController::class);
});
