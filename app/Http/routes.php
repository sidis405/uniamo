<?php

Route::get('/', '\Uniamo\Http\Controllers\HomeController@index');

include(__DIR__.'/../Uniamo/Routes/routes_auth.php');

Route::group(array('prefix' => 'admin', 'middleware' => 'auth'), function () {

    Route::get('/', '\Uniamo\Http\Controllers\Admin\HomeController@index');

    //NEWS SECTION
    include(__DIR__.'/../Uniamo/Routes/routes_news.php');
    include(__DIR__.'/../Uniamo/Routes/routes_categories.php');
    include(__DIR__.'/../Uniamo/Routes/routes_tags.php');

    //PAGES SECTION

    //MENU SECTION
    
    //SETTINGS SECTION

});