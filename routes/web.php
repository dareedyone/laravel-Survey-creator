<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/questionaires/create', 'QuestionaireController@create');

Route::post('/questionaires', 'QuestionaireController@store');

Route::get('/questionaires/{questionaire}', 'QuestionaireController@show');

Route::get('/questionaires/{questionaire}/questions/create', 'QuestionController@create');

Route::post('/questionaires/{questionaire}/questions', 'QuestionController@store');
Route::delete('/questionaires/{questionaire}/questions/{question}', 'QuestionController@destroy');

Route::get('/surveys/{questionaire}-{slug}', 'SurveyController@show');

Route::post('/surveys/{questionaire}-{slug}', 'SurveyController@store');
