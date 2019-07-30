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

Route::get('/banks', 'BanksController@index');

Route::get('/banks/create', 'BanksController@create');

Route::post('/banks', 'BanksController@store');

Route::get('/branches', 'BranchesController@index');

Route::get('/branches/create', 'BranchesController@create');

Route::post('/branches', 'BranchesController@store');

Route::post('/branches/search', 'BranchesController@search');
