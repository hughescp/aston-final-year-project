<?php

Blade::setContentTags('!{', '}!'); // for variables and all things Blade
Blade::setEscapedContentTags('!!{', '}!!'); // for escaped data

Route::group(['middlewear' => ['api']],function(){
    Route::post('/fetchAreas', 'AreasController@fetch');
});
