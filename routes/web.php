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

Route::get('/home', 'HomeController@index')->name('home');

//ADMIN
Route::get(         'admin',                                      'Admin\AdminController@index')->name('admin.index');

Route::get(         'admin/rubros/list',                          'Admin\RubroController@list');
Route::resource(    'admin/rubros',                               'Admin\RubroController');

Route::get(         'admin/categories/list',                      'Admin\CategoryController@list');
Route::resource(    'admin/categories',                           'Admin\CategoryController');

Route::get(         'admin/stockproducts/list',                   'Admin\StockproductController@list');
Route::resource(    'admin/stockproducts',                        'Admin\StockproductController');

Route::get(         'admin/saleproducts/list',                   'Admin\SaleproductController@list');
Route::resource(    'admin/stockproducts.saleproducts',                 'Admin\SaleproductController');
