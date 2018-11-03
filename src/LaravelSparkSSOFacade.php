<?php

namespace Jonnx\LaravelSparkSSO;

use Illuminate\Support\Facades\Facade;

class LaravelSparkSSOFacede extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-spark-sso';
    }
}