<?php

Route::get('/', 'PagesController@home');

Route::get('/about', 'PagesController@about');

Route::get('/areas', 'AreasController@index');
