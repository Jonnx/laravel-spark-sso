<?php

Route::group(['middleware' => ['web']], function() {

    // SSO ROUTES
    Route::get('/login/sso/google', '\Jonnx\LaravelSparkSSO\Http\Login\SSO\GoogleController@redirect');
    Route::any('/login/sso/google/callback', '\Jonnx\LaravelSparkSSO\Http\Login\SSO\GoogleController@callback');

    // SSO SETTING ROUTES
    Route::group(['namespace' => '\Jonnx\LaravelSparkSSO\Http\Settings\Team', 'middleware' => 'auth', 'web', 'hasTeam'], function() {
        
        Route::get('settings/teams/{team}/sso', 'SSOSettingsController@show');
        Route::put('settings/teams/{team}/sso', 'SSOSettingsController@update');
        
    });

});

