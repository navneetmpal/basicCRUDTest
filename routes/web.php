<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\RegisterController;



use App\Http\Controllers\ExcelController;
use App\Http\Controllers\PostController;

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
//     return view('welcome');
// });
Route::get('/', [RegisterController::class, 'index'])->name('index')->middleware(['auth']);
Route::get('/register',[RegisterController::class, 'register'])->name('register');
Route::post('finalSubmit', [RegisterController::class, 'finalSubmit'])->name('finalSubmit'); 
Route::get('edit/{id}', [RegisterController::class, 'edit'])->name('edit');//
Route::put('update/{id}', [RegisterController::class, 'update'])->name('update');
Route::get('search', [RegisterController::class, 'search'])->name('search');

Route::get('login', [RegisterController::class, 'login'])->name('login');
Route::post('login', [RegisterController::class, 'userlogin'])->name('login');
Route::get('logout', [RegisterController::class, 'logout'])->name('logout');

