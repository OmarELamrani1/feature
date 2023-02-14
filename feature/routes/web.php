<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\PersonneController;
use App\Http\Controllers\PosterController;
use App\Http\Controllers\PresidentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [Controller::class, 'check'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::middleware(['AuthAccess:President'])->group(function () {
        Route::resource('president', PresidentController::class);
        Route::resource('evaluation', EvaluationController::class);
        Route::get('getPoster/{id}', [PresidentController::class, 'getPoster'])->name('getPoster');
    });

    Route::middleware(['AuthAccess:Personne', 'verified'])->group(function () {
        // Route::resource('personne', PersonneController::class);
        Route::resource('posters', PosterController::class);
        Route::get('checkStatus', [PersonneController::class, 'checkStatus'])->name('checkStatus');
    });


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';
