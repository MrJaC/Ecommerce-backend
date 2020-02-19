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

//Auth routes
Auth::routes();
//default
Route::get('/', 'HomeController@index')->name('home');

Route::get('/register', function () {
    return view('register');
});
//Dashboard route
Route::get('/dashboard', function () {
    return view('dashboard/dashboard');
});
//Categories
Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {

    Route::get('/', 'CategoriesController@index')->name('categories');
    Route::get('/create-category', 'CategoriesController@create')->name('create-cat');
    Route::get('/edit-category/{id}/{name}', 'CategoriesController@catEdit')->name('edit-cat');

    Route::post('/delete/{id}', 'CategoriesController@delete')->name('delete');
    Route::post('/catadd', 'CategoriesController@add')->name('add-cat');
    Route::post('/cat-update', 'CategoriesController@update')->name('update');
});
//SubCategories
Route::group(['prefix' => 'subcategories', 'as' => 'subcategories.'], function () {

    Route::get('/', 'SubCategoriesController@index')->name('subcategories');
    Route::get('/create-subcategory', 'SubCategoriesController@create')->name('create-subcat');
    Route::get('/edit-subcategory/{id}/{name}', 'SubCategoriesController@subCatEdit')->name('edit-subcat');
    Route::post('/subadd', 'SubCategoriesController@add')->name('add-subcat');
    Route::post('/sub-update', 'SubCategoriesController@update')->name('update');
});


//Products
Route::group(['prefix' => 'products', 'as' => 'products.'], function () {

    Route::get('/', 'ProductsController@index')->name('products');
    Route::get('/create-products', 'ProductsController@create')->name('create-products');
    Route::post('/addprod', 'ProductsController@add')->name('add-products');
});

//Customers
Route::group(['prefix' => 'customers', 'as' => 'customers.'], function () {

    Route::get('/', 'CustomersController@index')->name('customers');
    Route::get('/create-customers', 'CustomersController@index')->name('create-customers');
});
//Vendors
Route::group(['prefix' => 'vendors', 'as' => 'vendors.'], function () {

    Route::get('/', 'VendorsController@index')->name('vendors');
    Route::get('/create-vendors', 'VendorsController@index')->name('create-vendors');
});
//User Profile
Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {

    Route::get('/', 'UserProfileController@index')->name('profile');
    Route::get('/edit-profile/{id}/{name}', 'UserProfileController@edit')->name('edit-profile');
});
