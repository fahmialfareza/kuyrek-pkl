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

// Language
Route::post('/language-choser', 'LanguageController@changeLanguage');
Route::post('/language/', array(
  'before' => 'csrf',
  'as' => 'language-choser',
  'uses' => 'LanguageController@changeLanguage',
));

// Front Controller
// KuyRek
Route::get('/', 'FrontController@home');
Route::get('/about', 'FrontController@about');
Route::get('/award', 'FrontController@award');
Route::get('/coverage', 'FrontController@coverage');
Route::get('/gallery', 'FrontController@gallery');
// Route::get('/merchandise', 'FrontController@merchandise');
Route::get('/ourteam', 'FrontController@ourteam');

// Place
Route::get('/provinces/{id}', 'FrontController@provinces');
Route::get('/regencies/{id}', 'FrontController@regencies');
Route::get('/districts/{id}', 'FrontController@districts');
Route::get('/villages/{id}', 'FrontController@villages');

// User
Route::get('/howtouseuser', 'FrontController@howtouseuser'); // belum
Route::get('/payment', 'FrontController@payment'); // belum
Route::get('/secureguarantee', 'FrontController@secureguarantee'); // belum
// Vendor
Route::get('/howtousevendor', 'FrontController@howtousevendor'); // belum
Route::get('/vendoradvantages', 'FrontController@vendoradvantages'); // belum
Route::get('/vendortips', 'FrontController@vendortips'); // belum
Route::get('/vendordirectory', 'FrontController@vendordirectory'); // belum

// Sport Venue
Route::get('/sportvenue', 'SportVenueController@index');
Route::get('/sportvenueofficial/{id}', 'SportVenueController@showofficial');
Route::get('/sportvenuenotofficial/{id}', 'SportVenueController@shownotofficial');

// Auth
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');
// Login with Provider
Route::get('/auth/{provider}', 'Auth\RegisterController@redirectToProvider');
Route::get('/auth/{provider}/callback', 'Auth\RegisterController@handleProviderCallback');

// User Loggedin
Route::group(['middleware' => ['user']], function() {
  // My Booking
  Route::post('/sportvenue/{id}/booking', 'SportVenueBookingController@store');
  Route::get('/home/mybooking', 'SportVenueBookingController@index');
  Route::get('/home/mybooking/{id}/cancel', 'SportVenueBookingController@destroy');
  Route::get('/home/mybooking/{id}/confirmation', 'SportVenueBookingController@edit');
  Route::post('/home/mybooking/{id}/update', 'SportVenueBookingController@update');
  Route::get('/home/mybooking/{id}/print', 'PDFController@booking_invoice'); // belum
  // Profile
  Route::get('/home/myprofile', 'HomeController@myprofile');
  Route::get('/home/setting', 'HomeController@setting');
  Route::post('/home/setting', 'HomeController@setting_store');
  Route::post('/home/setting/{id}', 'HomeController@setting_update');
  // Venue Wishlist
  Route::get('/venuewishlist/{id}', 'SportVenueWishlistController@store');
  Route::get('/home/venuewishlist', 'SportVenueWishlistController@index');
  Route::get('/home/venuewishlist/{id}', 'SportVenueWishlistController@destroy');
  // Password
  Route::get('/home/password', 'HomeController@password');
  Route::post('/home/password', 'HomeController@password_update');
  // Sport Venue
  Route::post('/sportvenue/{id}', 'SportVenueReviewController@store');
});

// Admin
Route::group(['middleware' => ['admin']], function() {
  // Dashboard
  Route::get('/admin/dashboard', 'AdminController@index'); // belum
  // Sport Venue Vendor
  Route::get('/admin/sportvenue/vendor', 'SportVenueVendorController@index');
  Route::get('/admin/sportvenue/vendor/create', 'SportVenueVendorController@create');
  Route::post('/admin/sportvenue/vendor', 'SportVenueVendorController@store');
  Route::get('/admin/sportvenue/vendor/{id}/edit', 'SportVenueVendorController@edit');
  Route::post('/admin/sportvenue/vendor/{id}', 'SportVenueVendorController@update');
  Route::get('/admin/sportvenue/vendor/{id}/delete', 'SportVenueVendorController@destroy');
  // Sport Venue Cetegory
  Route::get('/admin/sportvenue/category', 'SportVenueCategoryController@index');
  Route::get('/admin/sportvenue/category/create', 'SportVenueCategoryController@create');
  Route::post('/admin/sportvenue/category', 'SportVenueCategoryController@store');
  Route::get('/admin/sportvenue/category/{id}/edit', 'SportVenueCategoryController@edit');
  Route::post('/admin/sportvenue/category/{id}', 'SportVenueCategoryController@update');
  Route::get('/admin/sportvenue/category/{id}/delete', 'SportVenueCategoryController@destroy');
  // Sport Venue
  Route::get('/admin/sportvenue', 'AdminController@sportvenues');
  Route::get('/admin/sportvenue/create', 'SportVenueController@create');
  Route::post('/admin/sportvenue', 'SportVenueController@store');
  Route::get('/admin/sportvenue/{id}/edit', 'SportVenueController@edit');
  Route::post('/admin/sportvenue/{id}', 'SportVenueController@update');
  Route::get('/admin/sportvenue/{id}/delete', 'SportVenueController@destroy');
  // Sport Venue Price
  Route::get('/admin/sportvenue/price/{id}/create', 'SportVenuePriceController@create');
  Route::post('/admin/sportvenue/price/{id}', 'SportVenuePriceController@store');
  Route::get('/admin/sportvenue/price/{id}/edit', 'SportVenuePriceController@edit');
  Route::post('/admin/sportvenue/price/{id}/update', 'SportVenuePriceController@update');
  Route::get('/admin/sportvenue/price/{id}/delete', 'SportVenuePriceController@destroy');
  // Sport Venue Booking
  Route::get('/admin/sportvenue/booking', 'SportVenueBookingController@bookings');
  Route::get('/admin/sportvenue/{id}/booking', 'SportVenueBookingController@confirmation');
});

// Vendor
Route::group(['middleware' => ['vendor']], function() {
  Route::get('/vendor/dashboard', 'VendorController@index'); // belum
});
