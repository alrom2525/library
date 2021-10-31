<?php

use Illuminate\Support\Facades\Route;

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

// The Laravel route built in 
Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'Auth2\HomeController@index')->name('home');
Route::get('auth/login','Auth2\LoginController@index')->name('login');
Route::post('auth/login','Auth2\LoginController@login')->name('login-post');
Route::get('auth/logout','Auth2\LoginController@logout')->name('logout');
Route::resource('library/book','Library\BookController');
Route::post('setsession', 'Auth2\SessionController@setSession')->name('setsession')->middleware('auth');

/**
 * Register the typical reset password routes for an application. 
 */
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

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
     // Matches the "/admin/" URL
    Route::resource('','AdminController'); 
    Route::resource('permission','PermissionController');
    Route::resource('permissionrole','PermissionRoleController');
    Route::resource('menu','MenuController');
    Route::post('menu/store-order','MenuController@storeOrder')->name('menu.store-order');
    Route::resource('menurole','MenuRoleController');
    Route::resource('role','RoleController');
    Route::resource('user','UserController');
});
