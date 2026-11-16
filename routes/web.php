<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;

Route::get('/', [PortfolioController::class, 'welcome'])->name('welcome');
Route::get('/about', [PortfolioController::class, 'about'])->name('about');
Route::get('/gallery', [PortfolioController::class, 'gallery'])->name('gallery');