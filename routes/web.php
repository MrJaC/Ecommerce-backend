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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});
//Dashboard route
Route::get('/dashboard', function () {
    return view('dashboard/dashboard');
});
//Categories
Route::get('/categories', 'CategoriesController@index')->name('categories');
Route::get('/create-category', 'CategoriesController@create')->name('create-cat');
Route::get('/edit-category', 'CategoriesController@catEdit')->name('edit-cat');
Route::post('/delete/{id}', 'CategoriesController@delete')->name('delete.id');
/*Route::get('/delete/{id}', function ($id) {
    return $id;
});*/
Route::post('/catadd','CategoriesController@add');

//SubCategories
Route::get('/subcategories', 'SubCategoriesController@index')->name('subcategories');
Route::get('/create-subcategory', 'SubCategoriesController@create')->name('create subcat');
Route::post('/subadd','SubCategoriesController@add');
//Products
Route::get('/products', 'ProductsController@index')->name('products');
Route::get('/create-products', 'ProductsController@index')->name('create products');
//Customers
Route::get('/customers', 'CustomersController@index')->name('customers');
Route::get('/create-customers', 'CustomersController@index')->name('create customers');
