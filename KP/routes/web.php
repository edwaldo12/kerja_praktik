<?php

use App\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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
// Route::get('/test123', function () {
// $customer = DB::table('customers')->find(12);
//     $customer = Customer::find(12);
//     dd($customer);
// });

Auth::routes();

Route::group(['middleware' => 'revalidate'], function () {
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/dashboard', 'DashboardController@index');
        Route::resource('/users', 'UsersController');
        Route::resource('/agendas', 'AgendasController');
        Route::resource('/products', 'ProductsController');
        Route::put('/products/activate/{id}', 'ProductsController@activateProduct')->name('products.activate');
        Route::resource('/orders', 'OrdersController');
        Route::get('/orders/updateOrder/{id}', 'OrdersController@confirmAdmin')->name('orders.updateStatus');
        Route::get('/orders/processOrder/{id}', 'OrdersController@processOrders')->name('orders.processOrder');
        Route::get('/orders/onDelivery/{id}', 'OrdersController@onDelivery')->name('orders.onDelivery');
        Route::get('/orders/confirm/{id}', 'OrdersController@confirm')->name('orders.confirm');
        Route::get('/orders/dibatalkan/{id}', 'OrdersController@hapusPesananUser')->name('orders.hapusPesananUser');
        Route::resource('/dashboard', 'DashboardController');
        Route::resource('/reviews', 'ReviewsController');
        Route::resource('/customers', 'CustomersController');
        Route::put('/customer/activate/{id}', 'CustomersController@activate')->name('customer.activate');
        Route::put('/customer/useractive/{id}', 'UsersController@activateUser')->name('user.activate');
        Route::get('/halaman.edit.pelanggan/{customer}', 'CustomersController@edit')->name(
            'halaman.edit.pelanggan'
        );
        Route::put('/ubah.pelanggan/{customer}', 'CustomersController@update')->name('ubah.pelanggan');
        Route::get('/checkStock/{id}', 'OrdersController@checkStock');
        Route::get('/test', 'OrdersController@store');
        Route::get('/getDetailOrder/{id}', 'DashboardController@getDetailOrder');
        Route::get('/getAllProduct', 'DashboardController@get_product');
        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/logout', function () {
            Auth::logout();
            return Redirect::to('login');
        });
        // Route::get('pesanan_perbulan', 'DashboardController@pesanan_perbulan');
    });
});


Route::get('omset_bulanan', 'DashboardController@omset_bulanan');



Route::group(['middleware' => 'revalidate'], function () {
    Route::group(['middleware' => 'customer.auth'], function () {
        Route::post('/product/add/cart', 'CartController@addCart')->name('cart.add');
        Route::post('/pay', 'CartController@paid')->name('cart.paid');
        Route::post('/confirmation/{id}', 'CartController@confirmation')->name('payment.upload');
        Route::get('/product/see/cart', 'CartController@index')->name('get.cart');
        Route::get('/requestCart', 'CartController@getCart')->name('cart.getCart');
        Route::get('/checkout', 'CartController@payCart')->name('cart.checkout');
        Route::get('/viewconfirmation/{id}', 'CartController@viewConfirmation')->name('viewconfirmation');
        Route::get('/showHistory', 'CartController@showHistory')->name('customer.history');
        Route::get('/showDetailOrder/{fk_order}', 'CartController@showDetailOrder')->name('showDetailOrder');
        Route::get('/deleteOrder/{id}', 'CartController@cancelOrder')->name('deleteOrder');
        Route::get('/customer/logout', 'CompanyProfileController@logout')->name('customerLogout');
        Route::get('/customer/profile', 'CompanyProfileController@edit')->name('customer.edit');
        Route::put('/customer/updateProfile', 'CompanyProfileController@update')->name('customer.update');
        Route::delete('/cart/{id}', 'CartController@removeCart')->name("cart.delete");
        Route::get('/cartPlus/{id}', 'CartController@cartPlus')->name('cart.plus');
        Route::get('/cartMin/{id}', 'CartController@cartMin')->name('cart.min');

        Route::get('cartPlus/{id}/{jumlah_pesanan}', 'CartController@cartPlus');

        Route::get('cartMin/{id}/{jumlah_pesanan}', 'CartController@cartMin');
    });
});



Route::get('/customer/create', 'CustomersController@create')->name('customer.create');
Route::post('/customer/store', 'CompanyProfileController@store')->name('customer.store');
Route::get('/login.customers', 'CompanyProfileController@login')->name('login.customers');
Route::post('/customer/login', 'CompanyProfileController@userLogin')->name('userLogin');

Route::get('/', 'CompanyProfileController@home')->name('home');
Route::get('/about', 'CompanyProfileController@about_us')->name('about');
Route::get('/product', 'CompanyProfileController@products')->name('product');
Route::get('/agenda', 'CompanyProfileController@agenda')->name('agenda');
Route::get('/contact', 'CompanyProfileController@contact')->name('contact');
Route::get('/showAgenda/{id}', 'CompanyProfileController@show')->name('showAgenda');
Route::post('/reviews', 'ReviewsController@store')->name('review.store');
Route::get('/product/details/{id}', 'CompanyProfileController@showProduct')->name('product.details');




// Route::get('/hash/{hash}', 'HomeController@hash');
