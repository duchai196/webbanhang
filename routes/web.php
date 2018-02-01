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
Route::get('/dang-xuat','FrontEndController@getLogout')->name('logout');

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/','FrontEndController@getIndex')->name('home');
Route::get('/san-pham','FrontEndController@getShop')->name('getShop');
Route::get('/san-pham/{slug}','FrontEndController@getProduct')->name('getProduct');
Route::get('/tin-tuc','FrontEndController@getBlog')->name('getBlog');
Route::get('/tin-tuc/{slug}','FrontEndController@getPost')->name('getPost');
Route::get('/lien-he','FrontEndController@getContact')->name('getContact');
Route::get('danh-muc/{id}','FrontEndController@getCategory')->name('getCategory');





//gio hang
Route::get('/gio-hang/',function (){
    $cart=Cart::content();
    return view('frontend.pages.cart',compact('cart'));
})->name('cart');
Route::post('/them-gio-hang/','CartController@postCart')->name('postAddToCart');
Route::post('/cart/update/{id}/','CartController@update')->name('updateCart');
Route::post('cart/remove/{id}','CartController@remove')->name('removeCart');


//thanh toan
Route::get('thanh-toan','CartController@getCheckOut')->name('getCheckout');
Route::post('thanh-toan','CartController@postCheckOut')->name('postCheckout');

//loc san pham
Route::post('filter/price','FrontEndController@filterPrice')->name('filter');


//
Route::get('/sub',function (){

    $con=\App\Model\Category::with('subCategory')->find(13);
    foreach ($con as $it)
    {
        foreach ($it->subCategory as $item) {
            foreach ($item->product as $i)
            {
//                dump($item->subCategory);
                echo '--'.$i->name."<br>";
            }
        }

    }

});

