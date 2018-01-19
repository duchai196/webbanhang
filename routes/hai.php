<?php
/**
 * Created by PhpStorm.
 * User: HaiDucNguyen
 * Date: 1/17/2018
 * Time: 1:56 PM
 */
Route::resources([
   'brand'=>'BrandController',
   'category'=>'CategoryController',
   'post'=>'PostController',
   'product'=>'ProductController',
   'setting'=>'SettingController',
   'user'=>'UserController',
   'slide'=>'SlideController',
]);
Route::get('/',function(){
	return view('admin.pages.index');
})->name('index');
Route::post('category/list','CategoryController@ajax')->name('category.ajax');
Route::post('post/list','PostController@ajax')->name('post.ajax');
Route::post('product/list','ProductController@ajax')->name('product.ajax');
Route::post('user/list','UserController@ajax')->name('user.ajax');
Route::post('brand/list','BrandController@ajax')->name('brand.ajax');
Route::post('slide/list','SlideController@ajax')->name('slide.ajax');

