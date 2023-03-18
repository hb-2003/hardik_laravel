<?php

use Illuminate\Support\Facades\Route;
use Alcaitiff\LaravelUrlEncode\Routing\Router;

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
    Route::match(['get', 'post'], '/', 'HomeController@index')->name('home');
   
    Route::get('file/{url}/{url1?}/{name?}', 'HomeController@file')->name('file');
    Route::match(['get', 'post'], 'productdetail/{id}', 'HomeController@productdetail')->name('productdetail');
    Route::match(['get', 'post'], 'cart', 'HomeController@Cart')->name('cart');
    Route::match(['get', 'post'], 'product/categorie/{id}', 'HomeController@categorie')->name('categorie');
    Route::match(['get', 'post'], 'contectus', 'HomeController@contectus')->name('contectus');
    Route::match(['get', 'post'], 'product', 'HomeController@product')->name('product');
    Route::match(['get', 'post'], 'aboutus', 'HomeController@product')->name('aboutus');
    // serch 
    Route::match(['get', 'post'], 'search', 'HomeController@search')->name('search');
    Route::match(['get', 'post'], 'contectus', 'HomeController@contectus')->name('contectus');
    Route::match(['get', 'post'], 'aboutus', 'HomeController@aboutus')->name('aboutus');
    Route::match(['get', 'post'], 'faqs', 'HomeController@faqs')->name('faqs');
    Route::match(['get', 'post'], 'subscribe', 'HomeController@subscribe')->name('subscribe');
    Route::match(['get', 'post'], 'categorieproduct/{id}', 'HomeController@categorieproduct')->name('categorieproduct');

});

Route::prefix('user')->namespace('User')->name('user.')->middleware(['auth', 'verified', 'is_user'])->group(function () {
    Route::match(['get', 'post'], 'dashboard', 'DashboardController@index')->name('dashboard');
    Route::match(['get', 'post'], 'product', 'DashboardController@product')->name('product');
    Route::match(['get', 'post'], 'profile', 'DashboardController@profile')->name('profile');
    Route::match(['get', 'post'], 'social', 'DashboardController@social')->name('social');
    Route::match(['get', 'post'], 'email', 'DashboardController@email')->name('email');
    Route::match(['get', 'post'], 'notification', 'DashboardController@notification')->name('notification');
    Route::match(['get', 'post'], 'change_pass', 'DashboardController@change_pass')->name('change_pass');
    Route::match(['get', 'post'], 'subscribe', 'HomeController@subscribe')->name('subscribe');
    // serch 
    Route::match(['get', 'post'], 'search', 'DashboardController@search')->name('search');
    // order
    Route::match(['get', 'post'], 'order', 'DashboardController@order')->name('order');
    Route::match(['get', 'post'], 'cansal/{id}', 'OrderController@cansal')->name('cansal');
    Route::match(['get', 'post'], 'cansalorderreorder/{id}', 'OrderController@cansalorderreorder')->name('cansalorderreorder');
    Route::match(['get', 'post'], 'orderreturn/{id}', 'OrderController@orderreturn')->name('orderreturn');
    Route::match(['get', 'post'], 'orderreorder/{id}', 'OrderController@orderreorder')->name('orderreorder');
    Route::match(['get', 'post'], 'account', 'DashboardController@account')->name('account');
    Route::match(['get', 'post'], 'product/categorie/{id}', 'DashboardController@categorie')->name('categorie');
    Route::match(['get', 'post'], 'allproduct', 'ProductController@allproduct')->name('allproduct');


    // address 
    Route::match(['get', 'post'], 'address', 'AddressController@address')->name('address');
    Route::match(['get', 'post'], 'addressadd', 'AddressController@addressadd')->name('addressadd');
    Route::match(['get', 'post'], 'addressedit/{id}', 'AddressController@addressedit')->name('addressedit');
    Route::match(['get', 'post'], 'addressdelete/{id}', 'AddressController@addressdelete')->name('addressdelete');

    // review 
    Route::match(['get', 'post'], 'review', 'ReviewController@review')->name('review');

    //cities

    Route::match(['get', 'post'], 'cities', 'AddressController@cities')->name('cities');



    // productdetail

    Route::match(['get', 'post'], 'productdetail/{id}', 'ProductController@productdetail')->name('productdetail');
    Route::match(['get', 'post'], 'buyproduct/{id}', 'ProductController@buyproduct')->name('buyproduct');

    // Cart

    Route::match(['get', 'post'], 'cart', 'CartController@Cart')->name('cart');
    Route::match(['get', 'post'], 'cartcount', 'CartController@Cartcount')->name('cartcount');
    Route::match(['get', 'post'], 'cartdetail', 'CartController@Cartdetail')->name('cartdetail');
    Route::match(['get', 'post'], 'cartdelete/{id}', 'CartController@Cartdelete')->name('cartdelete');
    // byu peoduct 


    // checkout
    Route::match(['get', 'post'], 'checkout', 'CheckoutController@checkout')->name('checkout');
    Route::match(['get', 'post'], 'buycheckout', 'CheckoutController@buycheckout')->name('buycheckout');
    Route::match(['get', 'post'], 'rezolpay', 'CheckoutController@rezolpay')->name('rezolpay');
    Route::match(['get', 'post'], 'success', 'CheckoutController@success')->name('success');


    Route::match(['get', 'post'], 'contectus', 'ContectUsController@contectus')->name('contectus');
    Route::match(['get', 'post'], 'aboutus', 'ContectUsController@aboutus')->name('aboutus');
    Route::match(['get', 'post'], 'faqs', 'ContectUsController@faqs')->name('faqs');
});

Route::prefix('admin')->namespace('Admin')->name('admin.')->middleware(['auth', 'verified', 'is_admin'])->group(function () {
    Route::get('home', 'HomeController@home')->name('home');
    //user
    Route::match(['get', 'post'], 'User', 'UserController@user')->name('User');
    Route::match(['get', 'post'], 'userinactive/{id}', 'UserController@userinactive')->name('userinactive');


    // Manufacturer
    Route::match(['get', 'post'], 'Manufacturer', 'ManufacturerController@Manufacturer')->name('Manufacturer');
    Route::match(['get', 'post'], 'Manufactureradd', 'ManufacturerController@Manufactureradd')->name('Manufactureradd');
    Route::match(['get', 'post'], 'Manufactureredit/{id}', 'ManufacturerController@Manufactureredit')->name('Manufactureredit');
    Route::match(['get', 'post'], 'Manufacturerdelete/{id}', 'ManufacturerController@Manufacturerdelete')->name('Manufacturerdelete');

    // Manufacturer
    Route::match(['get', 'post'], 'Categorie', 'CategorieController@Categorie')->name('Categorie');
    Route::match(['get', 'post'], 'Categorieadd', 'CategorieController@Categorieadd')->name('Categorieadd');
    Route::match(['get', 'post'], 'Categorieedit/{id}', 'CategorieController@Categorieedit')->name('Categorieedit');
    Route::match(['get', 'post'], 'Categoriedelete/{id}', 'CategorieController@Categoriedelete')->name('Categoriedelete');

    // Attribute
    Route::match(['get', 'post'], 'Attribute', 'AttributeController@Attribute')->name('Attribute');
    Route::match(['get', 'post'], 'Attributeadd', 'AttributeController@Attributeadd')->name('Attributeadd');
    Route::match(['get', 'post'], 'Attributeedit/{id}', 'AttributeController@Attributeedit')->name('Attributeedit');
    Route::match(['get', 'post'], 'Attributedelete/{id}', 'AttributeController@Attributedelete')->name('Attributedelete');

    // Attributevlaue
    Route::match(['get', 'post'], 'Attributevlaue', 'AttributevlaueController@Attributevlaue')->name('Attributevlaue');
    Route::match(['get', 'post'], 'Attributevlaueadd', 'AttributevlaueController@Attributevlaueadd')->name('Attributevlaueadd');
    Route::match(['get', 'post'], 'Attributevlaueedit/{id}', 'AttributevlaueController@Attributevlaueedit')->name('Attributevlaueedit');
    Route::match(['get', 'post'], 'Attributevlauedelete/{id}', 'AttributevlaueController@Attributevlauedelete')->name('Attributevlauedelete');


    // Unit
    Route::match(['get', 'post'], 'Unit', 'UnitController@Unit')->name('Unit');
    Route::match(['get', 'post'], 'Unitadd', 'UnitController@Unitadd')->name('Unitadd');
    Route::match(['get', 'post'], 'Unitedit/{id}', 'UnitController@Unitedit')->name('Unitedit');
    Route::match(['get', 'post'], 'Unitdelete/{id}', 'UnitController@Unitdelete')->name('Unitdelete');


    // Product
    Route::match(['get', 'post'], 'Product', 'ProductController@Product')->name('Product');
    Route::match(['get', 'post'], 'Productadd', 'ProductController@Productadd')->name('Productadd');
    Route::match(['get', 'post'], 'Productedit/{id}', 'ProductController@Productedit')->name('Productedit');
    Route::match(['get', 'post'], 'Productdelete/{id}', 'ProductController@Productdelete')->name('Productdelete');
    Route::match(['get', 'post'], 'attributegetdata', 'ProductController@attributegetdata')->name('attributegetdata');
    Route::match(['get', 'post'], 'categorie', 'ProductController@categorie')->name('categorie');
    Route::match(['get', 'post'], 'productreview/{id}', 'ProductController@productreview')->name('productreview');
    Route::match(['get', 'post'], 'reviewdelete/{id}', 'ProductController@reviewdelete')->name('reviewdelete');

    // slider
    Route::match(['get', 'post'], 'slider', 'SliderController@slider')->name('slider');
    Route::match(['get', 'post'], 'slideradd', 'SliderController@slideradd')->name('slideradd');
    Route::match(['get', 'post'], 'slideredit/{id}', 'SliderController@slideredit')->name('slideredit');
    Route::match(['get', 'post'], 'sliderdelete/{id}', 'SliderController@sliderdelete')->name('sliderdelete');

    // order
    Route::match(['get', 'post'], 'order', 'OrderController@order')->name('order');
    Route::match(['get', 'post'], 'pending', 'OrderController@pending')->name('pending');
    Route::match(['get', 'post'], 'confirmorder/{id}', 'OrderController@confirmorder')->name('confirmorder');
    Route::match(['get', 'post'], 'orderdetail/{id}', 'OrderController@orderdetail')->name('orderdetail');

    Route::match(['get', 'post'], 'cansal', 'OrderController@cansal')->name('cansal');
    Route::match(['get', 'post'], 'cansalorder/{id}', 'OrderController@cansalorder')->name('cansalorder');

    Route::match(['get', 'post'], 'return', 'OrderController@return')->name('return');

    Route::match(['get', 'post'], 'delivered', 'OrderController@delivered')->name('delivered');
    Route::match(['get', 'post'], 'deliveredconform/{id}', 'OrderController@deliveredconform')->name('deliveredconform');

    Route::match(['get', 'post'], 'return_pending', 'OrderController@return_pending')->name('return_pending');
    Route::match(['get', 'post'], 'confirmreturn/{id}', 'OrderController@confirmreturn')->name('confirmreturn');
    Route::match(['get', 'post'], 'notificationorder/{id}', 'OrderController@notificationorder')->name('notificationorder');
});
require __DIR__ . '/auth.php';
