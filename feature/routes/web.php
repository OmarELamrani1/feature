<?php

use App\Http\Controllers\AbstractsubmissionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\PersonneController;
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

// Routes of only Admin can be accessed
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

        Route::controller(AbstractsubmissionController::class)->group(function () {
            Route::get('abstractsOnlyTrashed', 'abstractsOnlyTrashed')->name('abstractsOnlyTrashed');
            Route::patch('/abstract/{id}/restore', 'abstractRestore')->name('abstractRestore');
            Route::delete('/abstract/{id}/forceDelete', 'abstractForceDelete')->name('abstractForceDelete');
        });

    });

    Route::resource('abstractsubmission', AbstractsubmissionController::class)->only('update');

// Routes that Admin can access with the president at the same time
    Route::middleware(['AuthAccess:President,Admin'])->group(function () {
        Route::resource('president', PresidentController::class);
        Route::get('deleteAbstract/{id}', [PresidentController::class, 'deleteAbstract'])->name('deleteAbstract');
    });

// Routes that Admin can access with the Personne(User) at the same time
    Route::middleware(['AuthAccess:Personne,Admin'])->group(function () {
        Route::resource('abstractsubmission', AbstractsubmissionController::class)->only('show');
    });

// Routes of only President can be accessed
    Route::middleware(['AuthAccess:President'])->group(function () {
        Route::resource('evaluation', EvaluationController::class)->only('store');
        Route::get('export', [EvaluationController::class, 'exportToWord'])->name('abstractWord');

        Route::controller(PresidentController::class)->group(function () {
            Route::get('getAbstract/{id}', 'getAbstract')->name('getAbstract');
        });

    });

// Routes of only Personne(User) can be accessed
    Route::middleware(['AuthAccess:Personne', 'verified'])->group(function () {
        Route::resource('abstractsubmission', AbstractsubmissionController::class)->except(['show','update']);
        Route::resource('author', AuthorController::class);

        Route::get('deleteAuthor/{id?}', [AuthorController::class, 'deleteAuthor'])->name('deleteAuthor');
        Route::controller(AuthorController::class)->group(function () {
            Route::get('/search-authors', 'searchAuthors')->name('searchAuthors');
            Route::post('addAuthor', 'addAuthor')->name('addAuthor');
            Route::get('/authors/{id}', 'show')->name('authors.show');
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
Route::post('image-upload', [ImageUploadController::class, 'storeImage'])->name('image.upload');
require __DIR__.'/auth.php';
