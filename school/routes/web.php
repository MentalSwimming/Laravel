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

Route::get('/', function () {
    return view('welcome');
});
//Students Routes
Route::get('/students', 'StudentsController@index')-> middleware('auth');
Route::post('/students', 'StudentsController@store') -> middleware('auth');
Route::post('/students/edit', 'StudentsController@update') -> middleware('auth');

//End Of Students Routes
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
