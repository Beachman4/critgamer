<?php


Route::group(['middleware' => ['web']], function () {
    Route::get('/', 'BaseController@index')->name('index');
    Route::get('/staff', 'BaseController@getStaff');
    //Route::get('/events', 'EventsController@index');
    Route::get('/twitch', 'BaseController@getTwitch');
    Route::group(['prefix' => 'events'], function() {
        Route::get('/{catchall?}', function () {
            return response()->view('frontend.events.index');
        })->where('catchall', '(.*)');
    });
    Route::get('/oopsyousuck', function() {
        abort(404);
    });
});


Route::group(['prefix' => 'api'], function() {
    Route::get('/events', 'ApiController@getEvents');
    Route::get('/events/{events}', 'ApiController@getEvent');
    Route::get('/events/{events}/seats', 'ApiController@getSeats');
});
