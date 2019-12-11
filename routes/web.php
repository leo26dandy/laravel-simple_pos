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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');



Route::get('/product', 'ProductController@index')->name('product.index');
Route::get('/product/create', 'ProductController@create')->name('product.create');
Route::post('/product', 'ProductController@store')->name('product.store');
Route::get('/product/{product}/edit', 'ProductController@edit')->name('product.edit');
Route::put('/product/{product}', 'ProductController@update')->name('product.update');
Route::delete('/product/{product}', 'ProductController@destroy')->name('product.destroy');


Route::get('/customer', 'CustomerController@index')->name('customer.index');
Route::get('/customer/create', 'CustomerController@create')->name('customer.create');
Route::post('/customer', 'CustomerController@store')->name('customer.store');
Route::get('/customer/{customer}/edit', 'CustomerController@edit')->name('customer.edit');
Route::put('/customer/{customer}', 'CustomerController@update')->name('customer.update');
Route::delete('/customer/{customer}', 'CustomerController@destroy')->name('customer.destroy');

Route::get('/invoice', 'InvoiceController@index')->name('invoice.index');
Route::get('/invoice/create', 'InvoiceController@create')->name('invoice.create');
Route::post('/invoice', 'InvoiceController@store')->name('invoice.store');
Route::get('/invoice/{invoice}/edit', 'InvoiceController@edit')->name('invoice.edit');
Route::put('/invoice/{invoice}', 'InvoiceController@update')->name('invoice.update');
Route::delete('/invoice/{invoice}', 'InvoiceController@deleteProduct')->name('invoice.delete_product');
Route::delete('/invoice/{invoice}', 'InvoiceController@destroy')->name('invoice.destroy');
Route::get('/invoice/{invoice}/print', 'InvoiceController@generateInvoice')->name('invoice.print');
