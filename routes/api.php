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
    ], function () {
        Route::get('logout', 'Auth\AuthController@logout');
        Route::get('user', 'Auth\AuthController@user');
    });
    Route::post('userdetails', 'Auth\AuthController@userdetails');
});

//API GROUP
Route::group(['prefix' => 'v1', 'name' => 'v1'], function () {
    //Categories
    Route::group(['prefix' => 'cat', 'name' => 'category.'], function () {
        Route::get('/category', 'Api\CategoryAPIController@index')->name('category');
    });
    //Subcategories
    Route::group(['prefix' => 'subcat', 'name' => 'subcategory'], function () {
        Route::get('/subcategories', 'Api\SubcategoriesAPIController@index')->name('subcategories');
        Route::get('/get-subcat', 'Api\SubcategoriesAPIController@getSubcat')->name('cat-sub');
        Route::get('/get-prod-sub', 'Api\SubcategoriesAPIController@getProdViaSub')->name('prod-sub');
    });
    //Vendors
    Route::group(['prefix' => 'ven', 'name' => 'vendors'], function () {
        Route::get('/vendors', 'Api\VendorsAPIController@index')->name('vendors');
        Route::get('/get-vendor', 'Api\VendorsAPIController@getMyVendors');
        Route::post('/add-vend-product', 'Api\VendorsAPIController@addVendorProduct');
        Route::get('/get-my-products', 'Api\VendorsAPIController@getMyVendorProducts');
        Route::get('/vendor-get', 'Api\VendorsAPIController@getVendor');
    });
    //Products
    Route::group(['prefix' => 'prod', 'name' => 'products'], function () {
        Route::get('/products', 'Api\ProductsAPIController@index')->name('products');
        Route::get('/get-products', 'Api\ProductsAPIController@getProductID')->name('product-id');
        Route::post('add-products', 'Api\ProductsAPIController@addProd');
        Route::get('/get-prod-subcat', 'Api\ProductsAPIController@getProdIDViaSub')->name('get-prod-subcat');
    });
    //Banners
    Route::group(['prefix' => 'ban', 'name' => 'banners'], function () {
        Route::get('/banners', 'Api\BannersAPIController@index')->name('banners');
    });
    Route::group(['prefix' => 'user', 'name' => 'user'], function () {
        Route::get('/user-address', 'Api\UsersAPIController@getUserAddresses')->name('user-address');
        Route::post('update-address', 'Api\UsersAPIController@updateAddress')->name('update-address');
        Route::post('add-address', 'Api\UsersAPIController@addUserAddress')->name('add-address');
        Route::post('del-address', 'Api\UsersAPIController@deleteAddress')->name('del-address');
    });
});
//Route::get('/', 'Api\CategoryAPIController@index')->name('categories-api');
