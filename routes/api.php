<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::middleware('auth:airlock')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'AuthController@login');
// group route
Route::get('groups/{id}', 'GroupController@show');
Route::post('groups', 'GroupController@store');

// factories route
Route::get('/factories', 'FactoryController@index');
Route::post('factories', 'FactoryController@store');
Route::get('factories/{id}', 'FactoryController@show');
Route::delete('factories/{id}', 'FactoryController@destroy');

// users route
Route::get('/users', 'UserController@index');
Route::post('users', 'UserController@store');
//Route::get('users/{id}', 'UserController@show');
Route::delete('users/{id}', 'UserController@destroy');

// factories route
Route::get('/vendors', 'VendorController@index');
Route::post('vendors', 'VendorController@store');
Route::get('vendors/{id}', 'VendorController@show');
Route::delete('vendors/{id}', 'VendorController@destroy');

// quotations route
Route::get('/quotations', 'QuotationController@index');
Route::post('quotations', 'QuotationController@store');
Route::get('quotations/{id}', 'QuotationController@show');
Route::delete('quotations/{id}', 'QuotationController@destroy');
Route::get('/search-quotations', 'QuotationController@search');

// services route
Route::get('/services', 'ServiceController@index');
Route::post('services', 'ServiceController@store');
Route::get('services/{id}', 'ServiceController@show');
Route::delete('services/{id}', 'ServiceController@destroy');


// quotations services
Route::get('/quotation-services', 'QuotationServiceController@index');
Route::post('quotation-services', 'QuotationServiceController@store');
Route::get('quotation-services/{id}', 'QuotationServiceController@show');
Route::delete('quotation-services/{id}', 'QuotationServiceController@destroy');
Route::get('/search-quotation-services', 'QuotationServiceController@search');

