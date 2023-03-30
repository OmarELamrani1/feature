<?php

use App\Http\Controllers\AbstractsubmissionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\PersonneController;
use App\Http\Controllers\PosterController;
use App\Http\Controllers\PresidentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TopicController;
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

Route::get('/', [Controller::class, 'home'])->name('home');

Route::middleware('auth')->group(function () {

    Route::get('welcome', [Controller::class, 'check'])->name('check');

    // Route::get('submissionprint/{id}', [Controller::class, 'submissionprint'])->name('submissionprint');

    Route::get('submissionprint/{id}', [Controller::class, 'generatePDF'])->name('printsubmission');

    Route::middleware(['AuthAccess:Admin'])->group(function () {

        Route::resource('topic', TopicController::class);
        Route::get('topicOnlyTrashed', [TopicController::class, 'topicOnlyTrashed'])->name('topicOnlyTrashed');
        Route::patch('/topic/{id}/restoreTopic', [TopicController::class, 'restoreTopic'])->name('restoreTopic');
        Route::delete('/topic/{id}/forceDeleteTopic', [TopicController::class, 'forceDeleteTopic'])->name('forceDeleteTopic');


        Route::resource('administrator', AdminController::class)->only(['store','destroy']);

        Route::get('onlyTrashed', [AdminController::class, 'onlyTrashed'])->name('onlyTrashed');
        Route::patch('/president/{id}/restore', [AdminController::class, 'restore'])->name('restore');
        Route::delete('/president/{id}/forceDelete', [AdminController::class, 'forceDelete'])->name('forceDelete');

        Route::get('postersOnlyTrashed', [PosterController::class, 'postersOnlyTrashed'])->name('postersOnlyTrashed');
        Route::patch('/poster/{id}/restore', [PosterController::class, 'posterRestore'])->name('posterRestore');
        Route::delete('/poster/{id}/forceDelete', [PosterController::class, 'posterForceDelete'])->name('posterForceDelete');

    });

    Route::middleware(['AuthAccess:President'])->group(function () {
        Route::resource('president', PresidentController::class);
        Route::resource('evaluation', EvaluationController::class)->only('store');
        Route::get('getPoster/{id}', [PresidentController::class, 'getPoster'])->name('getPoster');
        Route::get('getAbstract/{id}', [PresidentController::class, 'getAbstract'])->name('getAbstract');
        Route::get('deletePoster/{id}', [PresidentController::class, 'deletePoster'])->name('deletePoster');
        Route::get('deleteAbstract/{id}', [PresidentController::class, 'deleteAbstract'])->name('deleteAbstract');
    });

    Route::middleware(['AuthAccess:Personne', 'verified'])->group(function () {
        // Route::resource('personne', PersonneController::class);

        Route::post('addAuthor', [AuthorController::class, 'addAuthor'])->name('addAuthor');

        Route::get('researchpaper', [AbstractsubmissionController::class, 'researchPaper'])->name('researchPaper');
        Route::get('clinicalcase', [AbstractsubmissionController::class, 'clinicalCase'])->name('clinicalCase');

        Route::resource('abstractsubmission', AbstractsubmissionController::class);
        Route::resource('author', AuthorController::class);

        Route::resource('posters', PosterController::class)->except(['index','create','edit','postersOnlyTrashed']);
        Route::get('checkStatus', [PersonneController::class, 'checkStatus'])->name('checkStatus');
    });


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';
