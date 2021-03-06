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

//Route::get('/', function () {
//    return phpinfo();
//});
//Route::get('/','UserController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/login', 'UserController@login');
Route::get('/logout', 'UserController@logout');


Route::get('/', 'ShopController@index');
Route::get('/goods/{gid}', 'ShopController@goods');
Route::get('/buy/{gid}', 'ShopController@buy');


Route::any('wx', 'WxController@index');
Route::any('guanzhu', 'WxController@guanzhu');






