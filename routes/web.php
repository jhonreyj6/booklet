<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
Route::post('/login', 'App\Http\Controllers\Auth\LoginController@login');
Route::post('/logout', 'App\Http\Controllers\Auth\LoginController@logout');
Route::post('/register', 'App\Http\Controllers\Auth\RegisterController@register');
Route::get('/search', 'App\Http\Controllers\SearchController@index');

Route::group(['prefix' => 'book', 'middleware' => 'auth'], function ($router) {
    Route::get('/', 'App\Http\Controllers\BookController@index')->withoutMiddleware('auth');
});

Route::group(['prefix' => 'cart', 'middleware' => 'auth'], function ($router) {
    Route::get('/', 'App\Http\Controllers\CartController@index');
    Route::post('/', 'App\Http\Controllers\CartController@store');
});

Route::group(['prefix' => 'order', 'middleware' => 'auth'], function ($router) {
    Route::get('/', 'App\Http\Controllers\OrderController@index');
    Route::get('/completed', 'App\Http\Controllers\OrderController@index');
    Route::get('/cancelled', 'App\Http\Controllers\OrderController@index');
    Route::get('/refund', 'App\Http\Controllers\OrderController@index');
});
