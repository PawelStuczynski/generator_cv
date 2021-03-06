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

Route::get('/form', 'FormController@show');
Route::post('/save','FormController@save');
Route::get('/template', 'FormController@fill');
Route::get('/success',[
    'uses' => 'FormController@success',
    'as' => 'form.success'
] );
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
