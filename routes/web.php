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

Route::get('/', function () {
    return view('welcome');
});
//Route::get('/topics', 'TopicController@index');
Route::resource('topics', 'TopicController', ['except' => 'show']);
Route::get('/topics/{slig}', 'TopicController@show')->name('topics.show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/my-topics', 'TopicController@myTopics')->name('topics.own');

\Auth::loginUsingId(4);
