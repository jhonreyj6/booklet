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
Route::get('/search', 'App\Http\Controllers\SearchController@index')->name('search');

Route::group(['prefix' => 'book', 'middleware' => 'auth'], function ($router) {
    Route::get('/', 'App\Http\Controllers\BookController@index')->withoutMiddleware('auth');
    Route::get('/reviews', 'App\Http\Controllers\ReviewController@index')->withoutMiddleware('auth');
});

Route::group(['prefix' => 'cart', 'middleware' => 'auth'], function ($router) {
    Route::get('/', 'App\Http\Controllers\CartController@index');
    Route::post('/', 'App\Http\Controllers\CartController@store');
    Route::delete('/', 'App\Http\Controllers\CartController@destroy');
});

Route::group(['prefix' => 'order', 'middleware' => 'auth'], function ($router) {
    Route::get('/', 'App\Http\Controllers\OrderController@index');
    Route::post('/', 'App\Http\Controllers\OrderController@store');
    Route::get('/completed', 'App\Http\Controllers\OrderCompleteController@index');
    Route::get('/cancelled', 'App\Http\Controllers\OrderCancelController@index');
    Route::get('/refund', 'App\Http\Controllers\OrderRefundController@index');
    Route::get('/invoice', 'App\Http\Controllers\OrderInvoiceController@index');
    Route::get('/pending', 'App\Http\Controllers\OrderPendingController@index');
    Route::get('/pending/{id}', 'App\Http\Controllers\OrderPendingController@show');
});
