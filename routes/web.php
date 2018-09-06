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
    return redirect('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resources([
    'usersAccess' => 'UsersAccessController',
    'modules' => 'ModuleController',
    'status' => 'StatusController',
]);

Route::group(['prefix' => 'scm', 'namespace' => 'scm', 'middleware' => ['auth']], function () {
    Route::resources([
    'materials' => 'MaterialController',
    'suppliers' => 'SupplierController',
    'requests' => 'RequestOrderController',
    'supplier-material' => 'SupplierMaterialController',
    ]);
});
