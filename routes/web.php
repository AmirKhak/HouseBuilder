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

Route::get('/', 'PagesController@home');
Route::get('/about_us', 'PagesController@about_us');
Route::get('/contact', 'PagesController@contact');
Route::get('/users', 'PagesController@users');
Route::get('/orders', 'PagesController@orders');
Route::get('/orders/{order}', 'PagesController@mark_as_done');
Route::delete('/users/{user}', 'PagesController@destroy');

Route::resource('faq', 'FaqsController', array('only' => array('index', 'store', 'destroy')));
Route::resource('order', 'OrdersController', array('only' => array('index', 'store')));

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
