<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});
/*Products Routes */ 
Route::get('/boutique','ProductController@index')->name('products.index');
Route::get('/boutique/{slug}','ProductController@show')->name('products.show');

/*card route add panier*/ 
Route::post('/panier/ajouter','CartController@store')->name('cart.store');

Route::get('/videpanier',function(){
    Cart::destroy();
});

// route panier
Route::get('/panier','CartController@index')->name('cart.index');

Route::delete('/panier/{rowId}','CartController@destroy')->name('cart.destroy');