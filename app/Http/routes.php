<?php

Route::get('/', 'PagesController@home');

Route::get('/about', 'PagesController@about');

Route::get('/areas', 'AreasController@index');
Route::get('/areas/{area]', 'AreasController@show');

Route::post('/areas', 'AreasController@index');