<?php
use Illuminate\Support\Facades\Route;

/* Users  */
Route::post('/auth/login','AuthController@login')->name('api.auth.login');
Route::post('/auth/social-login','AuthController@socialLogin')->name('api.auth.social-login');
Route::post('/auth/register','AuthController@register')->name('api.auth.register');

Route::group(['middleware'=>['jwt.verify']],function(){
    Route::get('auth/get-info','AuthController@getInfo')->name('api.auth.get-info');
    /* Update profile API */
    Route::post('/auth/update-profile','AuthController@updateProfile')->name('api.auth.update-profile');
    Route::post('/auth/update-profile-picture','AuthController@updateProfilePicture')->name('api.auth.update-profile-picture');
});
