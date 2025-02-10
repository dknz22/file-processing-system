<?php

use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FileController::class, 'index'])->name('files.index');
Route::post('/upload', [FileController::class, 'upload'])->name('files.upload');
Route::get('/download/{id}', [FileController::class, 'download'])->name('files.download');
