<?php

use Illuminate\Support\Facades\Route;

// Backend
Route::group(['prefix' => 'admin'], function(){

    Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Auth\LoginController@login')->name('admin.login.post');

    Route::get('/', 'DashboardController@index')->name('admin.dashboard');

    Route::get('profile', 'DashboardController@profile')->name('admin.profile');
    Route::post('/profile/save', 'DashboardController@profileSave')->name('admin.profile.save');
    Route::post('/change/password', 'DashboardController@changePassword')->name('admin.change.password');
    Route::get('logout', 'Auth\LoginController@logout')->name('admin.logout');

    Route::get('config', 'SettingController@index')->name('admin.config');
    Route::post('config', 'SettingController@update')->name('admin.config.save');

});


