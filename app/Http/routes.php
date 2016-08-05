<?php

    declare(strict_types = 1);

    Route::get('/', function () { return redirect(route('bulletins.index')); });

    Route::auth();

    Route::group(['middleware' => 'auth'], function () {
        Route::resource('bulletins', 'BulletinsController', ['only' => ['index', 'show']]);
        Route::resource('bulletins.offers', 'OffersController', ['only' => ['store']]);
        Route::get('offers/{id}/apply', ['as' => 'offers.apply', 'uses' => 'OffersController@apply']);

        Route::resource('users.bulletins', 'UsersBulletinsController', ['only' => ['index']]);
        Route::group(['prefix' => 'users'], function () {
            Route::resource('bulletins', 'UsersBulletinsController', ['except' => ['show', 'index']]);
        });
    });
