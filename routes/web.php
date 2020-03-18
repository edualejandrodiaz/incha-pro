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

Route::get('/', function () {
    return redirect()->route('home');
});
Route::get('/home', 'Front\HomeController@index')->name('home');
Route::resource('/catalogo', 'Front\ProductListController')->only(['index']);
Route::get('/catalogo/canjear/{slug}/{id}', 'Front\ProductListController@show')->name('catalogo.show');

Route::get('/catalogo/add-address', 'Front\ProductListController@addAddress')->name('catalogo.add-address');

//Route::get('/catalogo/canje/producto/{slug}/{id}', 'Front\ProductListController@orderAdd')->name('catalogo.order-add');
Route::post('/catalogo/canje/producto', 'Front\ProductListController@orderAdd')->name('catalogo.order-add');

Route::post('/catalogo', 'Front\ProductListController@productCategories')->name('catalogo.categories');
Route::get('/giftcard/canjear/{slug}', 'Front\GiftcardController@show')->name('giftcard.show');

Route::get('/gato/{id}', function ($id){
    return "Bienvenido gato: ".$id;
});

Route::get('/order/{order_id}', 'Front\UserController@showOrder')->name('order.detail');

Route::post('/login', 'Auth\CustomLoginController@loginUser')->name('login-user');
Route::post('/update-user', 'Front\UserController@update')->name('update-user');
Route::post('/login-cat', 'Auth\CustomLoginController@loginUserCat')->name('login-user-cat');
Route::group(['middleware' => 'usersession'], function () {
    Route::resource('/perfil', 'Front\UserController');
});

Route::post('logout', array('uses' => 'Auth\LoginController@logout'))->name('logout');
