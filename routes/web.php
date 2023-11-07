<?php

use App\Http\Controllers\ActivitiesController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\QuestionMapperController;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\SurveysController;
use App\Http\Controllers\UsersController;

use App\Models\Question_mapper;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('questions/fetchActivity', [QuestionsController::class,'fetchActivity'])->name('questions.fetchActivity');
Route::post('users/fetchActivity', [UsersController::class,'fetchActivity'])->name('users.fetchActivity');
Route::post('question_mapper/fetchActivity', [QuestionMapperController::class,'fetchActivity'])->name('question_mapper.fetchActivity');



Route::group(['as'=>'admin.', 'prefix' => 'admin', 'namespace'=>'', ], function(){

       Route::resource('questions', QuestionsController::class);
       Route::post('questions.destroy_status/{id}', [QuestionsController::class,'destroy_status'])->name('questions.destroy_status');
       Route::resource('projects', ProjectsController::class);
       Route::post('projects.destroy_status/{id}', [ProjectsController::class,'destroy_status'])->name('projects.destroy_status');
       Route::resource('activities', ActivitiesController::class);
       Route::post('activities.destroy_status/{id}', [ActivitiesController::class,'destroy_status'])->name('activities.destroy_status');
       Route::resource('users', UsersController::class);
       Route::post('users.destroy_status/{id}', [UsersController::class,'destroy_status'])->name('users.destroy_status');
       Route::resource('question_mapper', QuestionMapperController::class);
       Route::post('question_mapper.destroy_status/{id}', [QuestionMapperController::class,'destroy_status'])->name('question_mapper.destroy_status');
       Route::resource('survey', SurveysController::class);
       Route::get('surveyfilter', [SurveysController::class,'filter'])->name('surveyfilter');

 });
