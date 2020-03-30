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

// Route::get('/login', 'Auth\LoginController@getLogin')->name('login');
// Route::post('/login', 'Auth\LoginController@postLogin');
// Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

// Auth::routes(['verify' => true]);

Route::get('/', function () {
    return redirect()->route('dashboard');
});




// Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'ScheduleController@index')->name('dashboard');
    Route::get('/home', 'HomeController@index')->name('member.home');
    Route::get('/schedule', 'ScheduleController@index')->name('schedule.index'); 
    Route::get('/user', 'UserController@index')->name('user.index'); 
    Route::get('/schedule/data.json', 'ScheduleController@getSchduleJson')->name('schedule.data'); 
    Route::post('/schedule/post', 'ScheduleController@postSchedule')->name('schedule.post');
    Route::post('/schedule/delete', 'ScheduleController@deleteSchedule')->name('schedule.delete');
    
// });
