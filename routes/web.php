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
// Route::view('/','admin.pages.add');
Route::group(['namespace'=>'Backend','prefix'=>'admin','middleware'=>'adminLogin'],function (){
    require_once ('hai.php');
});

Route::view('/icon','admin.elements.icon');
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/','FrontEndController@getIndex')->name('home');
Route::get('/san-pham','FrontEndController@getShop')->name('getShop');
Route::get('/san-pham/{slug}','FrontEndController@getProduct')->name('getProduct');
Route::get('/tin-tuc','FrontEndController@getBlog')->name('getBlog');
Route::get('/lien-he','FrontEndController@getContact')->name('getContact');
Route::get('danh-muc/{id}','FrontEndController@getCategory')->name('getCategory');


//gio hang

Route::get('/cart/{id}','CartController@cart')->name('addToCart');
Route::post('/cart/{id}','CartController@postCart')->name('postAddToCart');
Route::post('/cart/update/{id}/','CartController@update')->name('updateCart');
Route::post('cart/{id}/remove','CartController@remove')->name('removeCart');
