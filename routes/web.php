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

//Report view
Route::get('/day-report', 'Report_Controller@dayreport');
Route::get('/monthly-report', 'Report_Controller@monthlyreport');
Route::post('/day-report', 'Invoice_Controller@filterdata');
Route::post('/monthly-report', 'Invoice_Controller@filtermonthly');
Route::get('/view-report/{id}', 'Invoice_Controller@viewreport');




//api 
Route::get('api/customer/{id}', 'Customer_Controller@getcustomer');
Route::get('api/material/{id}' ,'Material_Controller@getmaterial');