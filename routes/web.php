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

Route::namespace('Frontend')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('file/{url}/{url1?}/{name?}', 'HomeController@file')->name('file');
});

Route::prefix('user')->namespace('User')->name('user.')->middleware(['auth', 'verified', 'is_user'])->group(function () {
    Route::match(['get', 'post'], 'dashboard', 'DashboardController@index')->name('dashboard');
    Route::match(['get', 'post'], 'profile', 'DashboardController@profile')->name('profile');
    Route::match(['get', 'post'], 'social', 'DashboardController@social')->name('social');
    Route::match(['get', 'post'], 'email', 'DashboardController@email')->name('email');
    Route::match(['get', 'post'], 'notification', 'DashboardController@notification')->name('notification');
    Route::match(['get', 'post'], 'change_pass', 'DashboardController@change_pass')->name('change_pass');


    // address 
    Route::match(['get', 'post'], 'address', 'AddressController@address')->name('address');
    Route::match(['get', 'post'], 'addressadd', 'AddressController@addressadd')->name('addressadd');
    Route::match(['get', 'post'], 'addressedit\{id}', 'AddressController@addressedit')->name('addressedit');
    Route::match(['get', 'post'], 'addressdelete\{id}', 'AddressController@addressdelete')->name('addressdelete');


    // productdetail
    Route::match(['get', 'post'], 'productdetail\{id}', 'ProductController@productdetail')->name('productdetail');
    // Cart

    Route::match(['get', 'post'], 'cart', 'CartController@Cart')->name('cart');
    Route::match(['get', 'post'], 'cartcount', 'CartController@Cartcount')->name('cartcount');
    Route::match(['get', 'post'], 'cartdetail', 'CartController@Cartdetail')->name('cartdetail');


    // checkout

    Route::match(['get', 'post'], 'checkout', 'CheckoutController@checkout')->name('checkout');
});

Route::prefix('admin')->namespace('Admin')->name('admin.')->middleware(['auth', 'verified', 'is_admin'])->group(function () {
    Route::get('home', 'HomeController@home')->name('home');

    // Manufacturer
    Route::match(['get', 'post'], 'Manufacturer', 'ManufacturerController@Manufacturer')->name('Manufacturer');
    Route::match(['get', 'post'], 'Manufactureradd', 'ManufacturerController@Manufactureradd')->name('Manufactureradd');
    Route::match(['get', 'post'], 'Manufactureredit\{id}', 'ManufacturerController@Manufactureredit')->name('Manufactureredit');
    Route::match(['get', 'post'], 'Manufacturerdelete\{id}', 'ManufacturerController@Manufacturerdelete')->name('Manufacturerdelete');

    // Manufacturer
    Route::match(['get', 'post'], 'Categorie', 'CategorieController@Categorie')->name('Categorie');
    Route::match(['get', 'post'], 'Categorieadd', 'CategorieController@Categorieadd')->name('Categorieadd');
    Route::match(['get', 'post'], 'Categorieedit\{id}', 'CategorieController@Categorieedit')->name('Categorieedit');
    Route::match(['get', 'post'], 'Categoriedelete\{id}', 'CategorieController@Categoriedelete')->name('Categoriedelete');
    // Attribute
    Route::match(['get', 'post'], 'Attribute', 'AttributeController@Attribute')->name('Attribute');
    Route::match(['get', 'post'], 'Attributeadd', 'AttributeController@Attributeadd')->name('Attributeadd');
    Route::match(['get', 'post'], 'Attributeedit\{id}', 'AttributeController@Attributeedit')->name('Attributeedit');
    Route::match(['get', 'post'], 'Attributedelete\{id}', 'AttributeController@Attributedelete')->name('Attributedelete');

    // Attributevlaue
    Route::match(['get', 'post'], 'Attributevlaue', 'AttributevlaueController@Attributevlaue')->name('Attributevlaue');
    Route::match(['get', 'post'], 'Attributevlaueadd', 'AttributevlaueController@Attributevlaueadd')->name('Attributevlaueadd');
    Route::match(['get', 'post'], 'Attributevlaueedit\{id}', 'AttributevlaueController@Attributevlaueedit')->name('Attributevlaueedit');
    Route::match(['get', 'post'], 'Attributevlauedelete\{id}', 'AttributevlaueController@Attributevlauedelete')->name('Attributevlauedelete');

    // Unit
    Route::match(['get', 'post'], 'Unit', 'UnitController@Unit')->name('Unit');
    Route::match(['get', 'post'], 'Unitadd', 'UnitController@Unitadd')->name('Unitadd');
    Route::match(['get', 'post'], 'Unitedit\{id}', 'UnitController@Unitedit')->name('Unitedit');
    Route::match(['get', 'post'], 'Unitdelete\{id}', 'UnitController@Unitdelete')->name('Unitdelete');


    // Product
    Route::match(['get', 'post'], 'Product', 'ProductController@Product')->name('Product');
    Route::match(['get', 'post'], 'Productadd', 'ProductController@Productadd')->name('Productadd');
    Route::match(['get', 'post'], 'Productedit\{id}', 'ProductController@Productedit')->name('Productedit');
    Route::match(['get', 'post'], 'Productdelete\{id}', 'ProductController@Productdelete')->name('Productdelete');
});
require __DIR__ . '/auth.php';
