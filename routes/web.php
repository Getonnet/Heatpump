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
        Route::put('/product/add-attribute/{id}', 'Admin\Product\ProductController@attribute_add')->name('product.add-attribute');
        Route::delete('/product/del-attribute/{id}', 'Admin\Product\ProductController@attribute_del')->name('product.del-attribute');
        Route::resource('/product/category', 'Admin\Product\ProductCategoryController',['as' => 'product']);
        Route::resource('/product/brand', 'Admin\Product\ProductBrandController',['as' => 'product']);
        Route::resource('/product/attribute', 'Admin\Product\ProductAttributeController',['as' => 'product']);
        Route::resource('/product', 'Admin\Product\ProductController');
        /*-------------------
         * /Products
         * -----------------
         */


        /*-------------------
         * Customer
         * -----------------
         */
        Route::resource('/customer', 'Admin\Customer\CustomerController');
        /*-------------------
         * /Customer
         * -----------------
         */

        /*-------------------
         * Customer Orders
         * -----------------
         */
        Route::resource('/orders', 'Admin\Orders\OrderController');
        /*-------------------
         * /Customer Orders
         * -----------------
         */


        /*-------------------
         * User
         * -----------------
         */
        Route::put('/user/ability/{id}', 'Admin\User\UserRoleController@ability')->name('user.ability');
        Route::resource('/user/role', 'Admin\User\UserRoleController',['as' => 'user']);
        Route::resource('/user', 'Admin\User\UserController');
        /*-------------------
         * /User
         * -----------------
         */


        /*-------------------
         * Website Settings
         * -----------------
         */
        Route::get('/settings', 'Admin\SiteSettingsController@index')->name('settings');
        /*-------------------
         * /Website Settings
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

//Route::get('/pull', 'TestController@pull')->name('pull');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
