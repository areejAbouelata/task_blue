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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin-login', 'Auth\AdminLoginController@showLoginForm');
Route::post('admin-login', ['as' => 'admin-login', 'uses' => 'Auth\AdminLoginController@login']);
Route::group(['middleware' => 'auth:admin', 'prefix' => 'admin'], function () {
    Route::get('courses', 'DashBoard\CourseController@index')->name('index.course');
    Route::get('course/create', 'DashBoard\CourseController@create')->name('create.course');
    Route::post('course/create', 'DashBoard\CourseController@store')->name('store.course');
    Route::get('course/edit/{id}', 'DashBoard\CourseController@edit')->name('edit.course');
    Route::post('course/update/{id}', 'DashBoard\CourseController@update')->name('update.course');
});
Route::group(['middleware' => 'auth:web', 'prefix' => 'user'], function () {
    Route::get('/show/courses', 'DashBoard\UserController@index')->name('index.course');
    Route::get('/show/courses', 'DashBoard\UserController@index')->name('index.course');
    Route::get('enroll/course/{course_id}' , 'DashBoard\UserController@enroll_course')->name('user.enroll.course');
    Route::get('un_enroll/course/{course_id}' , 'DashBoard\UserController@un_enroll_course')->name('user.un_enroll.course');
});