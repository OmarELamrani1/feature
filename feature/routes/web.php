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
    Route::get('submissionprint/{id}', [Controller::class, 'generatePDF'])->name('printsubmission');

    Route::middleware(['AuthAccess:Admin'])->group(function () {
        Route::resource('topic', TopicController::class);
        Route::resource('administrator', AdminController::class)->only(['store','destroy']);

        Route::controller(AdminController::class)->group(function () {
            Route::get('onlyTrashed', 'onlyTrashed')->name('onlyTrashed');
            Route::patch('/president/{id}/restore', 'restore')->name('restore');
            Route::delete('/president/{id}/forceDelete', 'forceDelete')->name('forceDelete');
        });

        Route::controller(TopicController::class)->group(function () {
            Route::get('topicOnlyTrashed', 'topicOnlyTrashed')->name('topicOnlyTrashed');
            Route::patch('/topic/{id}/restoreTopic', 'restoreTopic')->name('restoreTopic');
            Route::delete('/topic/{id}/forceDeleteTopic', 'forceDeleteTopic')->name('forceDeleteTopic');
        });

        Route::controller(PosterController::class)->group(function () {
            Route::get('postersOnlyTrashed', 'postersOnlyTrashed')->name('postersOnlyTrashed');
            Route::patch('/poster/{id}/restore', 'posterRestore')->name('posterRestore');
            Route::delete('/poster/{id}/forceDelete', 'posterForceDelete')->name('posterForceDelete');
        });

        Route::controller(AbstractsubmissionController::class)->group(function () {
            Route::get('abstractsOnlyTrashed', 'abstractsOnlyTrashed')->name('abstractsOnlyTrashed');
            Route::patch('/abstract/{id}/restore', 'abstractRestore')->name('abstractRestore');
            Route::delete('/abstract/{id}/forceDelete', 'abstractForceDelete')->name('abstractForceDelete');
        });

    });

    Route::resource('abstractsubmission', AbstractsubmissionController::class)->only('update');

    Route::middleware(['AuthAccess:President'])->group(function () {
        Route::resource('president', PresidentController::class);
        Route::resource('evaluation', EvaluationController::class)->only('store');

        Route::controller(PresidentController::class)->group(function () {
            Route::get('getPoster/{id}', 'getPoster')->name('getPoster');
            Route::get('getAbstract/{id}', 'getAbstract')->name('getAbstract');
            Route::get('deletePoster/{id}', 'deletePoster')->name('deletePoster');
            Route::get('deleteAbstract/{id}', 'deleteAbstract')->name('deleteAbstract');
        });

    });

    Route::middleware(['AuthAccess:Personne', 'verified'])->group(function () {
        Route::resource('abstractsubmission', AbstractsubmissionController::class)->except('update');
        Route::resource('author', AuthorController::class);
        Route::resource('posters', PosterController::class)->except(['index','create','edit','postersOnlyTrashed','abstractsOnlyTrashed']);

        Route::get('deleteAuthor/{id?}', [AuthorController::class, 'deleteAuthor'])->name('deleteAuthor');

        Route::controller(AuthorController::class)->group(function () {
            Route::get('/search-authors', 'searchAuthors')->name('searchAuthors');
            Route::post('addAuthor', 'addAuthor')->name('addAuthor');
            Route::get('/authors/{id}', 'show')->name('authors.show');
            // Route::delete('deleteAuthor/{id}', 'deleteAuthor')->name('deleteAuthor');
        });

        Route::controller(AbstractsubmissionController::class)->group(function () {
            Route::get('researchpaper', 'researchPaper')->name('researchPaper');
            Route::get('clinicalcase', 'clinicalCase')->name('clinicalCase');
        });

        Route::get('checkStatus/{id}', [PersonneController::class, 'checkStatus'])->name('checkStatus');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';
