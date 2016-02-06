<?php

#   categories ROUTES

    Route::get('pagine', [
        'as'    => 'admin_pages',
        'uses'  => '\Uniamo\Http\Controllers\Admin\PagesController@index'
        ]);

    Route::get('pagine/crea', [
        'as'    => 'admin_create_pages',
        'uses'  => '\Uniamo\Http\Controllers\Admin\PagesController@create'
        ]);

    Route::post('pagine', [
        'as'    => 'admin_store_pages',
        'uses'  => '\Uniamo\Http\Controllers\Admin\PagesController@store'
        ]);

    Route::get('pagine/{id}/modifica', [
        'as'    => 'admin_edit_pages',
        'uses'  => '\Uniamo\Http\Controllers\Admin\PagesController@edit'
        ]);

    Route::put('pagine/{id}', [
        'as'    => 'admin_store_pages',
        'uses'  => '\Uniamo\Http\Controllers\Admin\PagesController@update'
        ]);

    Route::delete('pagine/{id}', [
        'as'    => 'admin_delete_pages',
        'uses'  => '\Uniamo\Http\Controllers\Admin\PagesController@destroy'
        ]);
