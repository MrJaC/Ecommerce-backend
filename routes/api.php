<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//AUTH GROUP
Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'Auth\AuthController@login')->name('login');
    Route::post('register', 'Auth\AuthController@register');
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'Auth\AuthController@logout');
        Route::get('user', 'Auth\AuthController@user');
    });
});

//API GROUP
Route::group(['prefix' => 'v1', 'name' => 'v1'], function(){
    //Categories
    Route::group(['prefix' => 'cat', 'name' => 'category.'], function(){
        Route::get('/category', 'Api\CategoryAPIController@index')->name('category');
    });
    //Subcategories
    Route::group(['prefix' => 'subcat', 'name' => 'subcategory'],function(){
        Route::get('/subcategories', 'Api\SubcategoriesAPIController@index')->name('subcategories');
    });
    //Vendors
    Route::group(['prefix' => 'ven', 'name' => 'vendors'],function(){
        Route::get('/vendors', 'Api\VendorsAPIController@index')->name('vendors');
    });
    //Products
    Route::group(['prefix' => 'prod', 'name' => 'products'],function(){
        Route::get('/products', 'Api\ProductsAPIController@index')->name('products');
    });
    //Banners
    Route::group(['prefix' => 'ban', 'name' => 'banners'],function(){
        Route::get('/banners', 'Api\BannersAPIController@index')->name('banners');
    });
});
//Route::get('/', 'Api\CategoryAPIController@index')->name('categories-api');
