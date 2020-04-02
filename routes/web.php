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


Auth::routes();
/*user*/
Route::get('/', function() { return redirect('/index'); });
Route::get('/index', 'ItemController@index')->name('home');
Route::get('/item/detail/{id}', 'ItemController@detail')->name('detail');
Route::group(['prefix' => 'cart', 'middleware' => 'auth:user'], function() {
	Route::get('/index', 'CartController@index')->name('cart');
	Route::post('/', 'CartController@store')->name('cart.store');
	Route::post('/index', 'CartController@deleteItem')->name('cart.delete');
});
Route::group(['prefix' => 'user_info', 'middleware' => 'auth:user'], function() {
	Route::get('/index', 'UserInfosController@index')->name('userinfo');
	Route::get('/create','UserInfosController@create')->name('userinfo.create');
	Route::post('/create','UserInfosController@store')->name('userinfo.store');
	Route::get('/edit/{id}','UserInfosController@edit')->name('userinfo.edit');
	Route::post('/edit','UserInfosController@update')->name('userinfo.update');
	Route::post('/index', 'UserInfosController@delete')->name('userinfo.delete');
});

/*admin */
Route::group(['prefix' =>'admin'], function() {
	Route::get('/', function() { return redirect('/admin/home'); });
	Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
	Route::post('login', 'Admin\LoginController@login');
});
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
	Route::post('logout', 'Admin\LoginController@logout')->name('admin.logout');
	Route::get('index', 'Admin\ItemController@index')->name('admin.home');
});

Route::get('/admin/item/detail/{id}', 'Admin\ItemController@detail')->name('item.detail');
Route::get('/admin/item/create', 'Admin\ItemController@create')->name('item.create');
Route::post('/admin/item/create', 'Admin\ItemController@store')->name('item.store');
Route::get('/admin/item/edit/{id}', 'Admin\ItemController@edit')->name('item.edit');
Route::post('/admin/item/edit', 'Admin\ItemController@update')->name('item.update');
