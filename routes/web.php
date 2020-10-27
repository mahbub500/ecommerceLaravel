<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', 'WebsiteController@index');
Route::get('/cart', 'CartController@index');

Route::get('/checkout', 'CheckoutController@index');
Route::post('/checkout', 'CheckoutController@store');

Route::post('/payment', 'PaymentController@payment');
Route::get('/success', 'PaymentController@success');
Route::get('/error', 'PaymentController@error');
Route::get('/cancel', 'PaymentController@cancel');

Route::get('/contact', 'ContactController@index');
Route::get('/products', 'ProductController@index');
Route::get('/product/{product}', 'ProductController@show');
Route::get('/blog', 'BlogController@index');
Route::get('/blog/{id}', 'BlogController@show');

Route::get('/products/category/{category}', 'ProductController@productByCategory');
Route::get('/products/subcategory/{subcategory}', 'ProductController@productBySubcategory');
Route::get('/products/color/{color}', 'ProductController@productByColor');
Route::get('/products/brand/{brand}', 'ProductController@productByBrand')->name('brand');

// Route::get('cart/add/{product}', 'CartController@addToCart');
Route::post('addtocart/{product}', 'CartController@cartAdd');
Route::get('cartitems', 'CartController@cartItems');
Route::get('cartpage', 'CartController@cartpage');
Route::get('cart/update', 'CartController@update');
Route::get('cart/remove/{rowid}', 'CartController@remove');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Auth::routes(['verify' => true]);

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'author']], function() {

	Route::get('/', 'AdminController@index');
	Route::resource('products', 'ProductController');
	Route::get('products/restore/{id}', 'ProductController@restore');
	Route::post('products/forcedelete/{id}', 'ProductController@forceDelete');
	Route::get('/subcategory/{id}', 'ProductController@subcategory');

	Route::get('/orders', 'OrderController@index');
	Route::get('/orders/{order}', 'OrderController@show');
	Route::get('/orders/delivered/{order}', 'OrderController@delivered');

});


Route::group(['prefix' => 'customer', 'namespace' => 'Customer', 'middleware' => ['auth', 'customer', 'verified']], function() {
	Route::get('/', 'CustomerController@index')->name('home');
});


// View::composer('layouts.website', function ($view){
// 	$user = App\User::first();
// 	$Brands = App\Brand::first();
// 	$view->with(['user' => $user, 'brands' => $brands]);
// });