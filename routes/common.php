<?php
use Illuminate\Support\Facades\Route;

/* Address  */
Route::get('/address/get-provinces','AddressController@getProvinces')->name('api.address.get-provinces');
Route::get('/address/get-districts/{province}','AddressController@getDistrictsByProvince')->name('api.address.get-districts');

