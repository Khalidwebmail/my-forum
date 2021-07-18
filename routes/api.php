<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * Category route
 */
Route::get('/categories', 'CategoryController@index')->name('category.list');
Route::get('/categories/{category}', 'CategoryController@show')->name('category.show');
Route::post('/categories/store', 'CategoryController@store')->name('category.store');
Route::patch('/categories/{category}/update', 'CategoryController@update')->name('category.update');
Route::delete('/categories/{category}/delete', 'CategoryController@destroy')->name('category.delete');

/**
 * Question route
 */
Route::get('/questions', 'QuestionController@index')->name('question.list');
Route::get('/questions/{question}', 'QuestionController@show')->name('question.show');
Route::post('/questions/store', 'QuestionController@store')->name('question.store');
Route::patch('/questions/{question}/update', 'QuestionController@update')->name('question.update');
Route::delete('/questions/{question}/delete', 'QuestionController@destroy')->name('question.delete');
