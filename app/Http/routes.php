<?php

Route::get('/', 'PagesController@home');

Route::get('/about', function(){
    return view('pages.about');   //means look in resources/views/about.blade.php
});
