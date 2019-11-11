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
})->name('welcome');

Route::get('about', function () {
    return view('about');
})->name('about');

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
  Route::resource('roles', 'RoleController')
              ->middleware('auth');
  Route::resource('users', 'UserController')
              ->except(['store','create'])
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
Route::get('doctors/mostrar', function () {
                        return view('admin.doctor.mostrar');
                    })
                    ->middleware(['auth','can:doctors.mostrar'])
                    ->name('doctors.mostrar');
Route::post('getDoctors/{id}', 'DoctorController@getDoctors')
              ->middleware('auth')
              ->name('getDoctors');

Route::get('getOnlySpecialties', 'SpecialtyController@getOnlySpecialties')
              ->middleware('auth')
              ->name('getOnlySpecialties');
Route::get('getOnlyAllActiveSpecialties', 'SpecialtyController@getOnlyAllActiveSpecialties')
              ->middleware('auth')
              ->name('getOnlyAllActiveSpecialties');

//Shopping y productos
Route::get('products/shopping', 'ProductController@shopping')
              ->middleware(['auth','can:products.shopping'])
              ->name('products.shopping');
Route::get('getCategories', 'CategoryController@getCategories')
              ->middleware('auth')
              ->name('getCategories');
Route::post('getCategory/{id}', 'ProductController@getCategory')
              ->middleware('auth')
              ->name('getCategory');

//Ordenes
Route::get('orders/crear', 'OrderController@crear')
              ->middleware(['auth','can:orders.crear'])
              ->name('orders.crear');
Route::post('getOnlyOrders/{id}', 'OrderController@getOnlyOrders')
              ->middleware('auth')
              ->name('getOnlyOrders');
Route::post('cantOrders/{id}', 'OrderController@cantOrders')
              ->middleware('auth')
              ->name('cantOrders');
Route::post('orders/store', 'OrderController@store')
              ->middleware(['auth','can:orders.store'])
              ->name('orders.store');

//Planes de grupo e individuales del socio
Route::post('getPlans/{idGroup}', 'PlanController@getPlans')
              ->middleware('auth')
              ->name('getPlans');
Route::post('getLayers/{id}', 'LayerController@getLayers')
              ->middleware('auth')
              ->name('getLayers');


Route::get('otros', function () {return view('otros');})
              ->middleware(['auth','can:otros'])
              ->name('otros');
Route::get('contacto', 'ContactoController@index')
              ->middleware(['auth','can:contacto'])
              ->name('contacto');
Route::post('/enviar', 'ContactoController@enviar')
              ->middleware('auth')
              ->name('enviar');
