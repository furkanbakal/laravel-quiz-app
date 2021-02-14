<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\MainController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function(){
    Route::get('panel',[MainController::class, 'dashboard'])->name('dashboard');
    Route::get('quiz/detay/{slug}', [MainController::class, 'quiz_detail'])->name('quiz.detail');
    Route::get('quiz/{slug}', [MainController::class, 'quiz'])->name('quiz.join');
    Route::post('quiz/{slug}/result', [MainController::class, 'result'])->name('quiz.result');

});

Route::group(['middleware'=>['auth','isAdmin'], 'prefix'=>'admin'], function(){
    Route::get('quizler/{id}', [QuizController::class , 'destroy'])->whereNumber('id')->name('quizler.destroy');
    Route::get('quizler/{id}/detaylar', [QuizController::class, 'show'])->whereNumber('id')->name('quizler.details');
    Route::get('quiz/{quiz_id}/questions/{id}', [QuestionController::class, 'destroy'])->whereNumber('id')->name('questions.destroy');
    Route::resource('quizler',QuizController::class);
    Route::resource('quiz/{quiz_id}/questions', QuestionController::class);
 
    });


