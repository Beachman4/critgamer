<?php

Route::get('/image/{path}', function(League\Glide\Server $server, $path) {
    $server->outputImage($path, $_GET);
});


Route::group(['middleware' => ['web']], function () {
    Route::get('/', 'BaseController@index')->name('index');
    Route::get('/staff', 'BaseController@getStaff');
    //Route::get('/events', 'EventsController@index');
    Route::get('/sponsers', 'BaseController@getSponsers');
    Route::get('/twitch', 'BaseController@getTwitch');
    Route::get('/logout', 'UserController@logOut');
    Route::group(['prefix' => 'events'], function() {
        Route::get('/{catchall?}', function () {
            return response()->view('frontend.events.index');
        })->where('catchall', '(.*)');
    });
    Route::get('/oopsyousuck', function() {
        abort(404);
    });
});
Route::get('/old', function() {
    return view('index');
});
Route::group(['prefix' => 'api', 'middleware' => ['web']], function() {
    Route::group(['prefix' => 'events'], function() {
        Route::get('/', 'ApiController@getEvents');
        Route::get('/{events}', 'ApiController@getEvent');
        Route::get('/{events}/seats', 'ApiController@getSeats');
        Route::get('/countSeats/{events}', 'ApiController@countSeats');
    });
    Route::post('/login', 'ApiController@login');
    Route::post('/register', 'ApiController@register');
    Route::get('/isSignedIn', 'ApiController@isSignedIn');
    Route::post('/customerInfo', 'ApiController@customerInfo');
    Route::post('/buySeat', 'ApiController@buySeat');
    Route::post('/buySeatSaved', 'ApiController@buySeatSaved');
    Route::get('/user/clearData', 'ApiController@clearData');
    Route::get('/user/{user}', 'ApiController@getUser');

    Route::group(['prefix' => 'admin'], function() {
        Route::group(['prefix' => 'users'], function() {
            Route::get('/', 'AdminController@getUsers');
            Route::get('/{user}', 'UserController@adminGetUser');
            Route::post('/{user}', 'UserController@adminUpdate');
        });
    });
});


Route::group(['prefix' => 'admin', 'middleware' => ['web']], function() {
    Route::get('/login', 'AdminController@login')->name('admin_login');
    Route::post('/login', 'AdminController@postLogin');
    Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function() {
        Route::get('/', 'AdminController@getIndex')->name('admin_index');

        Route::group(['prefix' => 'events'], function() {
            Route::get('/', 'EventsController@adminIndex');
            Route::get('/create', 'EventsController@adminCreate');
            Route::get('/{events}', 'EventsController@adminView');

            Route::post('/create', 'EventsController@adminStore');
        });

        Route::resource('sponsers', 'SponsersController');

        /*Route::group(['prefix' => 'sponsers'], function() {

        });*/

        Route::group(['prefix' => 'users'], function() {
            Route::get('/', 'UserController@adminIndex');
            Route::get('/{user}', 'UserController@adminView');
            Route::get('/{user}/edit', 'UserController@adminEdit');
            Route::get('/create', 'UserController@adminCreate');
            Route::get('/{user}/delete', 'UserController@adminDelete');

            Route::post('/create', 'UserController@adminStore');
        });
    });
});