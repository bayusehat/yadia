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
//Frontend
Route::get('/','HomeController@index');
Route::get('/profil','AboutController@index');
Route::get('/program','ProgramController@index');
Route::get('/gallery','GalleryController@index');
Route::get('/laporan','LaporanController@index');
Route::get('/kontak','KontakController@index');
