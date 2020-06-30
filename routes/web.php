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
    return redirect(route('login'));
});
// Route::get('/dashboard', function () {
//     return view('dashboard.index');
// });

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('home');

//Change password function
Route::get('/change-password','Auth\ChangePasswordController@index')->name('password.change');
Route::post('/change-password','Auth\ChangePasswordController@changePassword')->name('password.update');

//Suppliers
Route::get('/supplier', 'Supplier_Controller@index')->name('supplier');
Route::post('/supplier', 'Supplier_Controller@store')->name('supplier');
Route::get('/all-supplier', 'Supplier_Controller@show')->name('all-supplier');
Route::get('/supplier-edit/{id}', 'Supplier_Controller@edit')->name('supplier-edit');
Route::put('/supplier-update/{id}', 'Supplier_Controller@update')->name('supplier-update');
Route::get('/supplier/{id}', 'Supplier_Controller@destroy')->name('supplier-delete');



//Customers
Route::get('/customer', 'Customer_Controller@index')->name('customer');
Route::post('/customer', 'Customer_Controller@store')->name('customer');
Route::get('/all-customer', 'Customer_Controller@show')->name('all-customer');
Route::get('/customer-edit/{id}', 'Customer_Controller@edit')->name('customer-edit');
Route::put('/customer-update/{id}', 'Customer_Controller@update')->name('customer-update');
Route::get('/customer/{id}', 'Customer_Controller@destroy')->name('customer-delete');



//Material
Route::get('/material', 'Material_Controller@index')->name('material');
Route::post('/material', 'Material_Controller@store')->name('material');
Route::get('/all-material', 'Material_Controller@show')->name('all-material');
Route::get('/material-edit/{id}', 'Material_Controller@edit')->name('material-edit');
Route::put('/material-update/{id}', 'Material_Controller@update')->name('material-update');
Route::get('/material/{id}', 'Material_Controller@destroy')->name('material-delete');


//Invoice Entry
Route::get('/invoice-entery', 'Invoice_Controller@index')->name('invoice');
Route::get('/invoice-entery', 'Invoice_Controller@allmaterial')->name('all-material');
Route::post('/invoice-entery', 'Invoice_Controller@store')->name('invoice');

Route::get('/purchase-entery', 'Purchase_Controller@index')->name('purchase');
Route::post('/purchase-entery', 'Purchase_Controller@store')->name('purchase');



//Invoice Report view
Route::get('/day-report', 'Report_Controller@dayreport');
Route::get('/monthly-report', 'Report_Controller@monthlyreport');
Route::post('/day-report', 'Invoice_Controller@filterdata');
Route::post('/monthly-report', 'Invoice_Controller@filtermonthly');
Route::get('/view-report/{id}', 'Invoice_Controller@viewreport');

//Purchase Report view
Route::get('/dayreport', 'Report_Controller@purchasedayreport');
Route::get('/monthlyreport', 'Report_Controller@purchasemonthlyreport');
Route::post('/dayreport', 'Purchase_Controller@filterdata');
Route::post('/monthlyreport', 'Purchase_Controller@filtermonthly');
Route::get('/view-purchasereport/{id}', 'Purchase_Controller@viewreport');


Route::get('/all-customer/pdf','Report_Controller@export_pdf');


//api 
Route::get('api/supplier/{id}', 'Supplier_Controller@getsupplier');
Route::get('api/customer/{id}', 'Customer_Controller@getcustomer');
Route::get('api/material/{id}' ,'Material_Controller@getmaterial');