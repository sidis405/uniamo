<?php

#   categories ROUTES

    Route::get('news/tags', [
        'as'    => 'admin_tags',
        'uses'  => '\Uniamo\Http\Controllers\Admin\TagsController@index'
        ]);

    Route::get('news/tags/crea', [
        'as'    => 'admin_create_tags',
        'uses'  => '\Uniamo\Http\Controllers\Admin\TagsController@create'
        ]);

    Route::post('news/tags', [
        'as'    => 'admin_store_tags',
        'uses'  => '\Uniamo\Http\Controllers\Admin\TagsController@store'
        ]);

    Route::get('news/tags/{id}/modifica', [
        'as'    => 'admin_edit_tags',
        'uses'  => '\Uniamo\Http\Controllers\Admin\TagsController@edit'
        ]);

    Route::put('news/tags/{id}', [
        'as'    => 'admin_store_tags',
        'uses'  => '\Uniamo\Http\Controllers\Admin\TagsController@update'
        ]);

    Route::delete('news/tags/{id}', [
        'as'    => 'admin_delete_tags',
        'uses'  => '\Uniamo\Http\Controllers\Admin\TagsController@destroy'
        ]);
