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
   'slide'=>'SlideController'
]);

Route::post('category/list','CategoryController@ajax')->name('category.ajax');
Route::post('post/list','PostController@ajax')->name('post.ajax');