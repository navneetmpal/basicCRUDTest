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
Route::get('/', [RegisterController::class, 'index'])->name('index');
Route::get('/register',[RegisterController::class, 'register'])->name('register');
Route::post('finalSubmit', [RegisterController::class, 'finalSubmit'])->name('finalSubmit'); 
Route::get('edit/{id}', [RegisterController::class, 'edit'])->name('edit');//
Route::put('update/{id}', [RegisterController::class, 'update'])->name('update');
Route::get('search', [RegisterController::class, 'search'])->name('search');

Route::controller(ExcelController::class)->group(function(){
    Route::get('users', 'index');
    Route::get('users-export', 'export')->name('users.export');
    Route::post('users-import', 'import')->name('users.import');
});

// Route::get("create", [PostController::class, "create"]);
// Route::post('store', [PostController::class, "store"]);//
// Route::get("index", [PostController::class, "index"]);
// Route::post('ckeditor/upload', [PostController::class, 'upload'])->name('ckeditor.upload');



