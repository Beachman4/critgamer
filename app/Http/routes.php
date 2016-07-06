<?php


Route::group(['middleware' => ['web']], function () {
    Route::get('/', 'BaseController@index')->name('index');
    Route::get('/staff', 'BaseController@getStaff');
    Route::get('/events', 'EventsController@index');
    Route::get('/twitch', 'BaseController@getTwitch');
});


Route::group(['prefix' => 'api'], function() {
    Route::get('/events', 'ApiController@getEvents');
});
