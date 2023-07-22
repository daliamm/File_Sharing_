<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;

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
Route::get('/', [FileController::class, 'index'])->name('home');
Route::get('/upload-File', [FileController::class, 'upload'])->name('file.upload');
Route::post('/store-File', [FileController::class, 'store'])->name('file.store');
Route::get('/file/{link}', [FileController::class, 'download'])->name('file.download');
Route::get('/file/{link}/copy', [FileController::class, 'copyLink'])->name('file.copyLink');