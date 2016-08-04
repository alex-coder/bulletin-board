<?php

    declare(strict_types = 1);

    Route::get('/', function () {
        return response()->redirectTo(route('bulletins.index'));
    });

    Route::auth();

    Route::group(['middleware' => 'auth'], function () {
        Route::resource('bulletins', 'BulletinsController');
        Route::resource('bulletins.offers', 'OffersController', ['only' => ['store']]);
        Route::get('offers/{id}/apply', ['as' => 'offers.apply', 'uses' => 'OffersController@apply']);
    });
