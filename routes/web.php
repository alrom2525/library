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
Route::get('/','StartController@index');

/*
|--------------------------------------------------------------------------
| Namespaces https://laravel.com/docs/5.8/routing#route-group-namespaces
|--------------------------------------------------------------------------
|
| Another common use-case for route groups is assigning the same 
| PHP namespace to a group of controllers using the namespace method
|
*/ 
Route::prefix('admin')->namespace('Admin')->group(function () {
     // Matches the "/admin/" URL
    Route::resource('permission','PermissionController');
    Route::resource('menu','MenuController');
});
