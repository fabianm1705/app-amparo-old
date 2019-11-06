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
  Route::resource('doctors', 'DoctorController')
              ->middleware('auth');
  Route::resource('categories', 'CategoryController')
              ->middleware('auth');
  Route::resource('orders', 'OrderController')
              ->middleware('auth');
  Route::resource('products', 'ProductController')
              ->middleware('auth');
});

//Buscar socios
Route::get('getOnlyUsers', 'OrderController@getOnlyUsers')
              ->middleware('auth')
              ->name('getOnlyUsers');
Route::post('getOnlyUsersAdmin/{name?}/{nroDoc?}/', 'OrderController@getOnlyUsersAdmin')
              ->middleware('auth')
              ->where(['nroDoc' => '[0-9]+'])
              ->name('getOnlyUsersAdmin');
Route::post('getOnlyUsersNroDocAdmin/{nroDoc?}/', 'OrderController@getOnlyUsersNroDocAdmin')
              ->middleware('auth')
              ->where(['nroDoc' => '[0-9]+'])
              ->name('getOnlyUsersNroDocAdmin');

Route::get('pdf', 'PDFController@invoice')
              ->middleware('auth')
              ->name('pdf');

//Especialidades y médicos
Route::get('profesionales', function () {
    return view('doctorsList');
})->name('profesionales');
Route::get('getOnlySpecialties', 'SpecialtyController@getOnlySpecialties')
              ->middleware('auth')
              ->name('getOnlySpecialties');
Route::get('getOnlyAllActiveSpecialties', 'SpecialtyController@getOnlyAllActiveSpecialties')
              ->middleware('auth')
              ->name('getOnlyAllActiveSpecialties');
Route::post('getDoctors/{id}', 'DoctorController@getDoctors')
              ->middleware('auth')
              ->name('getDoctors');

//Shopping y productos
Route::get('Shopping', 'ProductController@shopping')
              ->middleware('auth')
              ->name('Shopping');
Route::get('getCategories', 'CategoryController@getCategories')
              ->middleware('auth')
              ->name('getCategories');
Route::post('getCategory/{id}', 'ProductController@getCategory')
              ->middleware('auth')
              ->name('getCategory');

//Ordenes
Route::get('OrdersAdmin', function () {
                  return view('ordersAdmin');
              })
              ->middleware('auth')
              ->name('OrdersAdmin');
Route::get('getOrders', 'OrderController@getOrders')
              ->middleware('auth')
              ->name('getOrders');
Route::post('getOnlyOrders/{id}', 'OrderController@getOnlyOrders')
              ->middleware('auth')
              ->name('getOnlyOrders');
Route::post('cantOrders/{id}', 'OrderController@cantOrders')
              ->middleware('auth')
              ->name('cantOrders');
Route::post('storeOrden', 'OrderController@store')
              ->middleware('auth')
              ->name('storeOrden');

//Planes de grupo e individuales del socio
Route::post('getPlans/{idGroup}', 'PlanController@getPlans')
              ->middleware('auth')
              ->name('getPlans');
Route::post('getLayers/{id}', 'LayerController@getLayers')
              ->middleware('auth')
              ->name('getLayers');


Route::get('otros', function () {return view('otros');})
              ->middleware('auth')
              ->name('otros');
Route::get('/contacto', 'ContactoController@index')
              ->middleware('auth')
              ->name('contacto');
Route::post('/enviar', 'ContactoController@enviar')
              ->middleware('auth')
              ->name('enviar');
