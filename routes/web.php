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

Route::get('/welcome', 'Home_C@show');
Route::get('/welcome/{id}', 'Home_C@pass');
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/', 'Home_C@index');
Route::get('/about', 'Home_C@about');
Route::get('/porto', 'Home_C@porto');
Route::get('/adminD', 'Home_C@admin');
Route::get('/r_home', 'Home_C@r_home');
Route::get('/r_about', 'Home_C@r_about');
Route::get('/r_porto', 'Home_C@r_porto');
Route::post('/logadm', 'Admin@index');
Route::post('/activating', 'Admin@activating');
Route::get('/admindash', 'Admin@dashboard');
Route::get('/homeA', 'Admin@home');
Route::resource('admin', 'Admin');
