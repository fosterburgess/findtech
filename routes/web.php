<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/main');
Route::get('/main', [MainController::class, 'index']);
