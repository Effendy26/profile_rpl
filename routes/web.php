<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('userHome');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



});
Route::get('/', [UserController::class, 'index'])->name('userHome');

Route::resource('/posts', \App\Http\Controllers\PostController::class);
Route::resource('/guru', \App\Http\Controllers\GuruController::class);
Route::resource('/posting', \App\Http\Controllers\PostingController::class);
Route::resource('/fasiliti', \App\Http\Controllers\FasilitiController::class);
Route::resource('/project', \App\Http\Controllers\ProjectController::class);
Route::resource('/dokumen', \App\Http\Controllers\DokumenController::class);





require __DIR__.'/auth.php';
        