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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/post', "PostController");

Route::get('/test', function () {
    dd(\Illuminate\Support\Facades\Auth::guard('admin')->attempt(['username' => "aweber@example.org", "password" => "secret"]));
});


Route::post('/admin/loginadmin', "Auth\\LoginController@login")->name('admin.login2');
Route::get('/admin/login', "Auth\\LoginController@loginadmin")->name('admin.login');
