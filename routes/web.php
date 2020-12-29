<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
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

// Auth::routes();

Auth::routes(["register" => false,"reset" => false]);

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'CategoryController@index')->name('home');
Route::resource('/categosies','CategoryController');
Route::get('/create','CategoryController@create');
Route::get('/edit/{id}','CategoryController@edit');
Route::post('/store','CategoryController@store');
Route::get('/delete/{id}','CategoryController@destroy');
Route::put('/update/{id}','CategoryController@update');