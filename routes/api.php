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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Auth

Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');
Route::group(['middleware' => 'auth:api'], function () {
    Route::post('details', 'UserController@details');
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
    Route::group(['prefix' => 'prod', 'name' => 'products'],function(){
        Route::get('/products', 'Api\ProductsAPIController@index')->name('products');
    });
});
//Route::get('/', 'Api\CategoryAPIController@index')->name('categories-api');
