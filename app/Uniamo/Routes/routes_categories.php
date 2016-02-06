<?php

#   categories ROUTES

    Route::get('categorie', [
        'as'    => 'admin_categories',
        'uses'  => '\Uniamo\Http\Controllers\Admin\CategoriesController@index'
        ]);

    Route::get('categorie/crea', [
        'as'    => 'admin_create_categories',
        'uses'  => '\Uniamo\Http\Controllers\Admin\CategoriesController@create'
        ]);

    Route::post('categorie', [
        'as'    => 'admin_store_categories',
        'uses'  => '\Uniamo\Http\Controllers\Admin\CategoriesController@store'
        ]);

    Route::get('categorie/{id}/modifica', [
        'as'    => 'admin_edit_categories',
        'uses'  => '\Uniamo\Http\Controllers\Admin\CategoriesController@edit'
        ]);

    Route::put('categorie/{id}', [
        'as'    => 'admin_store_categories',
        'uses'  => '\Uniamo\Http\Controllers\Admin\CategoriesController@update'
        ]);

    Route::delete('categorie/{id}', [
        'as'    => 'admin_delete_categories',
        'uses'  => '\Uniamo\Http\Controllers\Admin\CategoriesController@destroy'
        ]);
