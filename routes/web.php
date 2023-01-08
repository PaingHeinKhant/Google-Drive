<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\FolderController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware('auth')->group(function (){
    Route::resource('/file',FileController::class);
    Route::resource('/folder',\App\Http\Controllers\FolderController::class);
    Route::resource('/inputFolder',\App\Http\Controllers\InputFolderController::class);

    Route::get('/trash',[FolderController::class,'trash'])->name('trash');
//    Route::get('/trash',[FolderController::class,'trash'])->name('trash');
    Route::get('/restore/{id}',[FolderController::class,'restore'])->name('restore');
});

