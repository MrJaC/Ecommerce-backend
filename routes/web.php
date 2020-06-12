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
//default middlewear
Route::get('/', 'HomeController@index')->name('home');
Route::get('/admin', 'AdminController@index')->name('admin')->middleware('admin');
Route::get('/vendor', 'VendorController@index')->name('admin')->middleware('admin');
Route::get('/staff', 'StaffController@index')->name('admin')->middleware('admin');
Route::get('/customer', 'CustomerController@index')->name('admin')->middleware('admin');


Route::get('/register', function () {
    return view('register');
});
//Register
Route::get('/register', 'Auth\RegisterController@index')->name('register');

//Dashboard route
Route::get('/dashboard', function () {
    return view('dashboard/dashboard');
});
//Categories
Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {

    Route::get('/', 'CategoriesController@index')->name('categories');
    Route::get('/create-category', 'CategoriesController@create')->name('create-cat');
    Route::get('/edit-category/{id}/{name}', 'CategoriesController@catEdit')->name('edit-cat');

    Route::get('/cat-delete', 'CategoriesController@delete')->name('delete');
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
    Route::get('/sub-delete', 'SubCategoriesController@delete')->name('delete');
});


//Products
Route::group(['prefix' => 'products', 'as' => 'products.'], function () {

    Route::get('/', 'ProductsController@index')->name('products');
    Route::get('/create-products', 'ProductsController@create')->name('create-products');
    Route::get('/edit-products/{id}/{name}', 'ProductsController@edit')->name('edit-products');
    Route::post('/addprod', 'ProductsController@add')->name('add-products');
    Route::post('/prod-update', 'ProductsController@update')->name('update');
    Route::get('/products-delete', 'ProductsController@delete')->name('delete');
    Route::get('/products-gallery', 'ProductsController@gallery')->name('gallery');
    Route::post('/product-image-upload', 'ProductsController@imageUpload')->name('image-upload');
    Route::get('/product-view/{id}/{name}', 'ProductsController@view')->name('view-product');
    Route::get('/product-gallery-add/{id}/{name}', 'ProductsController@addImage')->name('add-image');
    Route::get('/product-gallery/{id}/{name}', 'ProductsController@gallery')->name('product-gallery');
});

//Customers
Route::group(['prefix' => 'customers', 'as' => 'customers.'], function () {

    Route::get('/', 'CustomersController@index')->name('customers');
    Route::get('/create-customers', 'CustomersController@create')->name('create-customers');
    Route::get('/edit-customers/{id}/{name}', 'CustomersController@editCustomer')->name('edit-customer');
    Route::get('/delete-customer', 'CustomersController@deleteCus')->name('delete-customer');
});
//Vendors
Route::group(['prefix' => 'vendors', 'as' => 'vendors.'], function () {

    Route::get('/', 'VendorsController@index')->name('vendors');
    Route::get('/create-vendors', 'VendorsController@create')->name('create-vendors');
    Route::get('/edit-vendor/{id}/{name}', 'VendorsController@edit')->name('edit-vendor');
    Route::post('/update-vendor', 'VendorsController@update')->name('update-vendor');
    Route::post('/add-vendor', 'VendorsController@add')->name('add-vendor');
    Route::get('/delete-vendor', 'VendorsController@delete')->name('delete-vendor');
    Route::get('/documents/{id}/{name}', 'VendorsController@documents')->name('documents');
    Route::post('document-add', 'VendorsController@documentAdd')->name('add-document');
    Route::get('delete-doc','VendorsController@documentDelete')->name('delete-document');
    Route::get('/pending-vendors', 'VendorsController@vendorPending')->name('pending-vendors');
    Route::get('/rejected-vendors', 'VendorsController@vendorRejected')->name('rejected-vendors');
    Route::get('/approved-vendors', 'VendorsController@vendorApproved')->name('approved-vendors');
});
Route::group(['prefix' => 'vendor-profile', 'as' => 'vendor-profile.'], function () {

    Route::get('/', 'VendorProfileController@index')->name('vendor-profile');
    Route::post('/addprofile', 'VendorProfileController@add')->name('profile-add');
});
//User Profile
Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {

    Route::get('/', 'UserProfileController@index')->name('profile');
    Route::get('/edit-profile/{id}/{name}', 'UserProfileController@edit')->name('edit-profile');
    Route::post('/add-user-profile', 'UserProfileController@add')->name('user-profile-add');
    Route::post('/update-user-profile', 'UserProfileController@edit')->name('user-profile-update');
});
//Staff
Route::group(['prefix' => 'staff', 'as' => 'staff.'], function () {

    Route::get('/', 'StaffController@index')->name('staff');
    Route::get('/create-staff', 'StaffController@create')->name('create-staff');
    Route::get('/edit-staff/{id}/{name}', 'StaffController@staffEdit')->name('edit-staff');
    Route::post('/add-staff', 'StaffController@addStaff')->name('add-staff');
    Route::get('/delete-staff', 'StaffController@delete')->name('delete-staff');
    Route::get('/update-staff', 'StaffController@update')->name('update-staff');
});
//Orders

Route::group(['prefix' => 'orders', 'as' => 'orders.'], function () {

    Route::get('/', 'OrdersController@index')->name('orders');
});
//Banners
Route::group(['prefix' => 'banners', 'as' => 'banners.'], function () {

    Route::get('/', 'BannersController@index')->name('banners');
    Route::post('/add-banner', 'BannersController@add')->name('add-banner');
});

//test image
Route::get('/{filename}', 'ProductsController@displayImage')->name('image.displayImage');
