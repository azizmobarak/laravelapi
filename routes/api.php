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



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Authorization for all
//register : email , name , password
Route::post('/adduser','UsersController@newuser');

//login : email , password
Route::post('/userlogin','UsersController@userlogin');

//create order : price
Route::post('/neworder','OrdersController@createorder');

//just token
Route::get('/userorders','OrdersController@userorders');

//create admin : email , password
Route::post('/newadmin','AdminController@createadmin');

//admin login : email , password
Route::post('/adminlogin','AdminController@adminlogin');

