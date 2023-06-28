<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Guest\PageController;
use App\Http\Controllers\Admin\ProjectController;




Route::get('/', [PageController::class, 'index'])->name('home');

Route::middleware(['auth','verified'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function(){
        Route::get('/',[DashboardController::class, 'index'])->name('home');
        Route::get('/profile',[DashboardController::class, 'profile'])->name('profile');
        Route::resource('project', ProjectController::class);
    });





require __DIR__.'/auth.php';
