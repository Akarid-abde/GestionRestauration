<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\ServantController;

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

Auth::routes(['verify' => true]);
// Auth::routes(["register" => true,"reset" => true]);

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'CategoryController@index')->name('home');
Route::resource('/categosies','CategoryController');
Route::get('/create','CategoryController@create');
Route::get('/edit/{id}','CategoryController@edit');
Route::post('/store','CategoryController@store');
Route::get('/delete/{id}','CategoryController@destroy');
Route::put('/update/{id}','CategoryController@update');


#route for tables 
Route::resource('/Tables','TableController');
Route::get('/Tables/create','TableController@create');
Route::get('/Tables/edit/{id}','TableController@edit');
Route::post('/Tables/store','TableController@store');
Route::get('/Tables/delete/{id}','TableController@destroy');
Route::put('/Tables/update/{id}','TableController@update');

#Route for Servaur 
Route::resource('/Servant','ServantController');
Route::get('/Servant/create','ServantController@create');
Route::get('/Servant/edit/{id}','ServantController@edit');
Route::post('/Servant/store','ServantController@store');
Route::get('/Servant/delete/{id}','ServantController@destroy');
Route::put('/Servant/update/{id}','ServantController@update');

#Route for Menu 
Route::resource('/Menu','MenuController');
Route::get('/Menu/create','MenuController@create');
Route::get('/Menu/edit/{id}','MenuController@edit');
Route::post('/Menu/store','MenuController@store');
Route::get('/Menu/delete/{id}','MenuController@destroy');
Route::put('/Menu/update/{id}','MenuController@update');


