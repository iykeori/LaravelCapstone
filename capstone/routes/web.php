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

//use Illuminate\Routing\Route;
Route::post('shoppingcart/addtocart','CartController@addtocart')->name('shoppingcart.addtocart');
Route::put('shoppingcart/update_cart','CartController@update_cart')->name('shoppingcart.update_cart');
Route::get('shoppingcart','CartController@cart')->name('shoppingcart.cart');
Route::delete('shoppingcart/removeitem','CartController@remove_item')->name('shoppingcart.remove_item');

Route::get('products/view_order','ProductController@view_order')->name('products.view_order');
Route::post('products/view_order','ProductController@view_order')->name('products.view_order');
Route::get('products/{id}/details','ProductController@detail')->name('products.detail');
Route::post('products/check_order','ProductController@check_order')->name('products.check_order');
Route::get('products/{id}/thankyou','ProductController@thankyou')->name('products.thankyou');

Route::resource('products', 'ProductController');
    Route::resource('items', 'ItemController')->middleware('auth');
    Route::resource('categories', 'CategoryController')->middleware('auth');
    


/*Route::get('/', function () {
    return view('welcome');
});*/
//Route::get('/','ProductController@index');

Route::get('/','PublicController@index');


Auth::routes();

Route::get('home', 'HomeController@index')->name('home');

// Route::get('/home2', 'HomeController@index2')->name('home');
