<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;

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


Route::view('/', 'helloworld')->name('home');
Route::get('dashboard', function () {
  return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/comments', [CommentController::class, 'index'])->name('comments');
Route::post('/comments', [CommentController::class, 'store'])->name('comments');

// Route::resource('comments', 'App\Http\Controllers\CommentController');

// Route::get('comments', function () {
//     return view('comments');
// })->name('comments');
//
// Route::get('welcome', function () {
//     return view('welcome');
// });

require __DIR__.'/auth.php';
