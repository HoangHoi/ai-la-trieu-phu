<?php

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

Route::get('/', 'HomeController@index')->name('home');
Route::get('session', 'UserController@session')->name('session');
Route::post('register', 'UserController@register')->name('register');
Route::post('logout', 'UserController@logout')->name('logout');

Route::group(['prefix' => 'questions'], function () {
    Route::get('/', 'QuestionController@index')->name('questions.index');
    Route::get('start', 'QuestionController@start')->name('questions.start');
    Route::post('check-answer', 'QuestionController@currentQuestion')->name('questions.currentQuestion');
    Route::get('next-question', 'QuestionController@nextQuestion')->name('questions.nextQuestion');
    Route::post('check-answer', 'QuestionController@checkAnswer')->name('questions.checkAnswer');
    Route::post('help', 'QuestionController@help')->name('questions.help');
});
