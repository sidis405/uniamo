<?php

Route::get('/', '\Uniamo\Http\Controllers\HomeController@index');

Route::get('/news', '\Uniamo\Http\Controllers\NewsController@index');
Route::get('/news/{id}/{slug}', '\Uniamo\Http\Controllers\NewsController@show');

// Route::get('/categorie', '\Uniamo\Http\Controllers\CategoriesController@index');
Route::get('/categorie/{slug}', '\Uniamo\Http\Controllers\CategoriesController@show');

// Route::get('/tag', '\Uniamo\Http\Controllers\TagsController@index');
Route::get('/tags/{slug}', '\Uniamo\Http\Controllers\TagsController@show');

Route::get('/utente/{nome}', '\Uniamo\Http\Controllers\UsersController@show');

include(__DIR__.'/../Uniamo/Routes/routes_auth.php');

Route::group(array('prefix' => 'admin', 'middleware' => 'auth'), function () {

    Route::get('/', '\Uniamo\Http\Controllers\Admin\HomeController@index');

    //NEWS SECTION
    include(__DIR__.'/../Uniamo/Routes/routes_news.php');

    //TAXONOMY
    include(__DIR__.'/../Uniamo/Routes/routes_categories.php');
    include(__DIR__.'/../Uniamo/Routes/routes_tags.php');

    //PAGES SECTION
    include(__DIR__.'/../Uniamo/Routes/routes_pages.php');

    //MENU SECTION
    
    //SETTINGS SECTION

});

Route::get('{page}', '\Uniamo\Http\Controllers\PagesController@show');