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

Route::group([

], function ($router) {

    Route::post('addEmployee','UserController@store');
    Route::post('deleteEmployee','UserController@destroy');
    Route::post('addSupplier','SupplierController@store');
    Route::get('showSuppliers','SupplierController@index');
    Route::get('showEmployee','UserController@index');
    Route::post('addRole','RoleController@store');
    Route::get('showRoles','RoleController@index');
    Route::post('deleteRole','RoleController@destroy');
    Route::post('addUnit','UnitController@store');
    Route::get('showUnits','UnitController@index');
    Route::post('deleteUnit','UnitController@destroy');
    Route::get('showCategories','CategoryController@index');
    Route::post('addCategory','CategoryController@store');
    Route::post('deleteCategory','CategoryController@destroy');
});






Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});
