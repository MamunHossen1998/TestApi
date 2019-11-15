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
Route::get('/', 'CustomerController@index');
Route::post('add/customer', 'CustomerController@addcustomer');
Route::get('get/customer', 'CustomerController@getcustomer');

Route::get('view/customer/data', 'CustomerController@getcustomerdata');
Route::get('delete/customer/data', 'CustomerController@deletecustomerdata');
Route::get('edit/customer/data', 'CustomerController@editcustomerdata');
Route::post('update/customer/data', 'CustomerController@updatecustomerdata');
Route::get('get/customer/pagination', 'CustomerController@getcustomerpagination');


Route::get('data_passing',function(){
  $customer=[
    'mama','sona','kakku','khal'
  ];

  return view('pass',[
    'customer'=>$customer
  ]);
});
