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

Route::get('/ss', function () {
    return view('dashboard.login');
});
Route::get('/', 'AuthController@index')->name('index');
Route::post('/login', 'AuthController@login')->name('login');
Route::prefix('/dashboard')->middleware('auth')->group(function () {
    Route::get('/', 'AdminController@index')->name('indexAdmin');
    Route::get('/create-task', 'AdminController@createTask')->name('createTask')->middleware('check.role');
    Route::post('/store-task', 'AdminController@storeTask')->name('storeTask');
    Route::post('/change-status', 'AdminController@changeStatus')->name('changeStatus');
    Route::get('/unassigned-task', 'AdminController@unassignedTask')->name('unassignedTask')->middleware('check.role');
    Route::post('/assign-task', 'AdminController@assignTask')->name('assignTask');
    Route::get('/logout', 'AdminController@logout')->name('logout');
});