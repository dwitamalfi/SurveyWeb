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


Route::get('/admin', 'AdminController@index');
Route::get('/admin/barang/create','AdminController@create');
Route::post('/admin/barang/store','AdminController@store');
Route::get('/admin/barang/edit/{id}','AdminController@edit');
Route::post('/admin/barang/update/{id}','AdminController@update');
Route::get('/admin/barang/validasi/{id}','AdminController@validasi');
Route::get('/','AdminController@home');

Auth::routes();