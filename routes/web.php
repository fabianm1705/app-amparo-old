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

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')
              ->name('home');

Route::group(['prefix' => 'admin'], function() {
  Route::resource('specialties', 'SpecialtyController')
              ->middleware('auth');
  Route::get('indexSocios', 'DoctorController@indexSocios')
              ->middleware('auth')
              ->name('doctors.indexSocios');
  Route::resource('doctors', 'DoctorController')
              ->middleware('auth');
  Route::resource('orders', 'OrderController')
              ->middleware('auth');
  Route::resource('products', 'ProductController')
              ->middleware('auth');
});

Route::get('pdf/{id}', 'PDFController@invoice')
              ->middleware('auth')
              ->name('pdf');
Route::get('getSpecialties', 'SpecialtyController@getSpecialties')
              ->middleware('auth')
              ->name('getSpecialties');
Route::get('getCels', 'ProductController@getCels')
              ->middleware('auth')
              ->name('getCels');
Route::get('getElectros', 'ProductController@getElectros')
              ->middleware('auth')
              ->name('getElectros');
Route::get('getOrders', 'OrderController@getOrders')
              ->middleware('auth')
              ->name('getOrders');
Route::get('getUsers', 'OrderController@getUsers')
              ->middleware('auth')
              ->name('getUsers');
Route::post('getDoctors/{id}', 'DoctorController@getDoctors')
              ->middleware('auth')
              ->name('getDoctors');
Route::post('limitOrders/{id}', 'OrderController@limitOrders')
              ->middleware('auth')
              ->name('limitOrders');
Route::get('otros', function () {return view('otros');})
              ->middleware('auth')
              ->name('otros');
Route::get('/contacto', 'ContactoController@index')
              ->middleware('auth')
              ->name('contacto');
Route::post('/enviar', 'ContactoController@enviar')
              ->middleware('auth')
              ->name('enviar');
