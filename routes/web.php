<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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

Route::get('/', [HomeController::class,'homepage']);
Route::get('/user_post_create',[HomeController::class,'user_post_create'])->middleware('auth');
Route::post('/user_post_store',[HomeController::class,'user_post_store'])->middleware('auth');
Route::get('/user_post_show',[HomeController::class,'user_post_show'])->middleware('auth');
Route::get('/user_post_delete/{id}',[HomeController::class,'user_post_delete']);
Route::get('/user_post_edit/{id}',[HomeController::class,'user_post_edit']);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home',[HomeController::class, 'index'])->middleware('auth')->name('home');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/post',[AdminController::class,'post']);
Route::post('/post_create',[AdminController::class,'post_create']);
Route::get('/post_show',[AdminController::class,'post_show']);
Route::get('/post_delete/{id}',[AdminController::class,'post_delete']);
Route::get('/post_edit/{id}',[AdminController::class,'post_edit']);
Route::post('/post_update/{id}',[AdminController::class,'post_update']);
Route::get('/post_details/{id}',[AdminController::class,'post_details']);