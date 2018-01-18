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
Route::view('/','admin.pages.add');
Route::group(['namespace'=>'Backend','prefix'=>'admin','middleware'=>'adminLogin'],function (){
    require_once ('hai.php');
});

Route::view('/icon','admin.elements.icon');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
