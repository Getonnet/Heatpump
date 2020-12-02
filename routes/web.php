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


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'BotManController@tinker');

Route::match(['get', 'post'], '/botman', 'BotManController@handle');


Route::group(['middleware' => 'auth'], function () {

    Route::prefix('admin')->group(function () {

        Route::get('/', 'Admin\DashboardController@index')->name('main');


        /*-------------------
         * Products
         * -----------------
         */
        Route::resource('/product/category', 'Admin\Product\ProductCategoryController',['as' => 'product']);
        Route::resource('/product/brand', 'Admin\Product\ProductBrandController',['as' => 'product']);
        Route::resource('/product/attribute', 'Admin\Product\ProductAttributeController',['as' => 'product']);
        Route::resource('/product', 'Admin\Product\ProductController');
        /*-------------------
         * /Products
         * -----------------
         */


        /*-------------------
         * User
         * -----------------
         */
        Route::put('/user/role/ability/{id}', 'Admin\User\UserRoleController@ability')->name('user.role.ability');
        Route::resource('/user/role', 'Admin\User\UserRoleController',['as' => 'user']);
        Route::resource('/user', 'Admin\User\UserController');
        /*-------------------
         * /User
         * -----------------
         */


        /*-------------------
         * Demo Page
         * -----------------
         */
        Route::get('/demo-page', 'Admin\DashboardController@demo_page')->name('demo.page');
        Route::get('/demo-table', 'Admin\DashboardController@demo_table')->name('demo.table');
        /*-------------------
         * /Demo Page
         * -----------------
         */
    });

});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
