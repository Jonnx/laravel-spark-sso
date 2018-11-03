<?php

// GOOGLE SSO ROUTES
Route::get('/login/sso/google', '\Jonnx\LaravelSparkSSO\Http\GoogleSSOController@redirectToProvider');
Route::any('/login/sso/google/callback', '\Jonnx\LaravelSparkSSO\Http\GoogleSSOController@callback');