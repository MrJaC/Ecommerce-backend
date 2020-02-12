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
Route::get('/categories', function () {
    return view('categories/categories');
});
Route::get('/createCat', function () {
    return view('categories/create');
});
//SubCategories
Route::get('/subcategories', function () {
    return view('subcategories/subcategories');
});
//Products
Route::get('/products', function () {
    return view('products/products');
});
