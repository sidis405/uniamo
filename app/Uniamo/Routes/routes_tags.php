<?php

#   tags ROUTES

    Route::get('tags', [
        'as'    => 'admin_tags',
        'uses'  => '\Uniamo\Http\Controllers\Admin\TagsController@index'
        ]);

    Route::get('tags/crea', [
        'as'    => 'admin_create_tags',
        'uses'  => '\Uniamo\Http\Controllers\Admin\TagsController@create'
        ]);

    Route::post('tags', [
        'as'    => 'admin_store_tags',
        'uses'  => '\Uniamo\Http\Controllers\Admin\TagsController@store'
        ]);

    Route::get('tags/{id}/modifica', [
        'as'    => 'admin_edit_tags',
        'uses'  => '\Uniamo\Http\Controllers\Admin\TagsController@edit'
        ]);

    Route::put('tags/{id}', [
        'as'    => 'admin_store_tags',
        'uses'  => '\Uniamo\Http\Controllers\Admin\TagsController@update'
        ]);

    Route::delete('tags/{id}', [
        'as'    => 'admin_delete_tags',
        'uses'  => '\Uniamo\Http\Controllers\Admin\TagsController@destroy'
        ]);
