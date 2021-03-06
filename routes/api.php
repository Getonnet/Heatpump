<?php

use Illuminate\Http\Request;

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
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::group(['middleware' => ['auth:api', 'cors']], function () {

    Route::resource('/product/category', 'Product\ProductCategoryController');

    Route::resource('/product/brand', 'Product\ProductBrandController');

});

//Route::group(['middleware' => 'cors'], function () {

    Route::get('/catch', 'TestController@refresh')->name('refresh'); //Refresh website

    Route::post('/make-order', 'MakeOrderController@make_order');//Order making
    Route::post('/make-request', 'MakeOrderController@make_request');//Order request

    Route::get('/product-recommend', 'ProductRecommendationController@recommend');//Product Recommendation
    Route::get('/product-category', 'ProductRecommendationController@category');
    Route::get('/product-brand', 'ProductRecommendationController@brand');
    Route::get('/product-single/{id}', 'ProductRecommendationController@product_show');//Single Product Show

    Route::resource('/users', 'User\UserController');

    Route::post('/auth/login', 'AuthController@login');
    Route::post('/auth/logout', 'AuthController@logout');
    Route::post('/auth/refresh', 'AuthController@refresh');
    Route::post('/auth/me', 'AuthController@me');

//});
