<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/main');
Route::get('/main', [MainController::class, 'index']);
Route::get('/addTag/{tag}', [MainController::class, 'addTag'])->name('main.addTag');
Route::get('/removeTag/{tag}', [MainController::class, 'removeTag'])->name('main.removeTag');
Route::any('/main/search', [MainController::class, 'search'])->name('main.search');
