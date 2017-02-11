<?php

Route::get('/', 'PagesController@home');

Route::get('/about', 'PagesController@about');

Route::get('/areas', 'AreasController@index');
Route::get('/areas/{area}', 'AreasController@show');
Route::get('/areas/{area}/asking_prices', 'AreasController@show_asking_prices');
Route::get('/areas/{area}/crime', 'AreasController@show_crime');
Route::get('/areas/{area}/neighbourhood', 'AreasController@show_neighbourhood');
Route::get('/areas/{area}/people', 'AreasController@show_people');
Route::get('/areas/{area}/pubtransport', 'AreasController@show_people');
Route::get('/areas/{area}/schools', 'AreasController@show_schools');
Route::get('/areas/{area}/sol', 'AreasController@show_sol');

Route::get('/test', 'PagesController@test');

Route::post('/areas', 'AreasController@index');
