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


//Admin
Route::group(['prefix' => 'admin'], function () {
    Route::get('/login','Admin\AuthController@login');
    Route::post('/doLogin','Admin\AuthController@doLogin');
    Route::get('/doLogout','Admin\AuthController@doLogout');

    Route::group(['middleware' => ['authLogin']], function () {
        Route::get('/dashboard','Admin\DashboardController@index');

        //Role
        Route::get('role','Admin\RoleController@index');
        Route::get('role/load','Admin\RoleController@loadData');
        Route::post('role/insert','Admin\RoleController@insert');
        Route::get('role/edit/{id}','Admin\RoleController@edit');
        Route::post('role/update/{id}','Admin\RoleController@update');
        Route::get('role/delete/{id}','Admin\RoleController@destroy');

        //Admin
        Route::get('admin','Admin\AdminController@index');
        Route::get('admin/load','Admin\AdminController@loadData');
        Route::post('admin/insert','Admin\AdminController@insert');
        Route::get('admin/edit/{id}','Admin\AdminController@edit');
        Route::post('admin/update/{id}','Admin\AdminController@update');
        Route::get('admin/delete/{id}','Admin\AdminController@delete');
    });
});