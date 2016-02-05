<?php

#   categories ROUTES

    Route::get('news/categorie', [
        'as'    => 'admin_categories',
        'uses'  => '\Uniamo\Http\Controllers\Admin\CategoriesController@index'
        ]);

    Route::get('news/categorie/crea', [
        'as'    => 'admin_create_categories',
        'uses'  => '\Uniamo\Http\Controllers\Admin\CategoriesController@create'
        ]);

    Route::post('news/categorie', [
        'as'    => 'admin_store_categories',
        'uses'  => '\Uniamo\Http\Controllers\Admin\CategoriesController@store'
        ]);

    Route::get('news/categorie/{id}/modifica', [
        'as'    => 'admin_edit_categories',
        'uses'  => '\Uniamo\Http\Controllers\Admin\CategoriesController@edit'
        ]);

    Route::put('news/categorie/{id}', [
        'as'    => 'admin_store_categories',
        'uses'  => '\Uniamo\Http\Controllers\Admin\CategoriesController@update'
        ]);

    Route::delete('news/categorie/{id}', [
        'as'    => 'admin_delete_categories',
        'uses'  => '\Uniamo\Http\Controllers\Admin\CategoriesController@destroy'
        ]);
