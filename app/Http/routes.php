<?php

Blade::setContentTags('!{', '}!'); // for variables and all things Blade
Blade::setEscapedContentTags('!!{', '}!!'); // for escaped data

Route::group(['middlewear' => ['web']],function(){
    Route::get('/', 'PagesController@home');

    Route::get('/about', 'PagesController@about');

    Route::get('/areas', 'AreasController@index');
    Route::post('/fetchAreas', 'AreasController@fetch');
    Route::get('/areas/{area}', 'AreasController@show');
    Route::get('/areas/{area}/asking_prices', 'AreasController@show_asking_prices');
    Route::get('/areas/{area}/crime', 'AreasController@show_crime');
    Route::get('/areas/{area}/neighbourhood', 'AreasController@show_neighbourhood');
    Route::get('/areas/{area}/pubtransport', 'AreasController@show_pubtransport');
    Route::get('/areas/{area}/schools', 'AreasController@show_schools');
    Route::get('/areas/{area}/sol', 'AreasController@show_sol');
    Route::post('/areas/comparison', 'AreasController@show_comparison');

    Route::get('/about_us', 'AreasController@about_us');
    Route::get('/test', 'PagesController@test');

    Route::post('/areas', 'AreasController@index');
    Route::post('/email-signup', 'PagesController@store');
});
