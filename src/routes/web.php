<?php

// GOOGLE SSO ROUTES
Route::group(['middleware' => ['web']], function() {

    Route::get('/login/sso/google', '\Jonnx\LaravelSparkSSO\Http\Login\SSO\GoogleController@redirect');
    Route::any('/login/sso/google/callback', '\Jonnx\LaravelSparkSSO\Http\Login\SSO\GoogleController@callback');

});