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

/* The Laravel route built in 
Route::get('/', function () {
    return view('welcome');
});
*/

use Illuminate\Support\Facades\Route;
Route::get('/','StartController@index')->name('start');
Route::get('auth/login','Auth2\LoginController@index')->name('login');
Route::post('auth/login','Auth2\LoginController@login')->name('login-post');
Route::get('auth/logout','Auth2\LoginController@logout')->name('logout');
Route::resource('library/book','Library\BookController');

/*
|--------------------------------------------------------------------------
| Namespaces https://laravel.com/docs/5.8/routing#route-group-namespaces
|--------------------------------------------------------------------------
|
| Another common use-case for route groups is assigning the same 
| PHP namespace to a group of controllers using the namespace method
|
*/ 
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
//Route::prefix('admin')->namespace('Admin')->middleware('auth')->group(function () {
     // Matches the "/admin/" URL
    Route::resource('','AdminController'); 
    Route::resource('permission','PermissionController');
    Route::resource('permissionrole','PermissionRoleController');
    Route::resource('menu','MenuController');
    Route::post('menu/store-order','MenuController@storeOrder')->name('menu.store-order');
    Route::resource('menurole','MenuRoleController');
    Route::resource('role','RoleController');
});
 