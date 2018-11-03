<?php

namespace Jonnx\LaravelSparkSSO\Http\Team\Settings;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\User;
use App\Team;

class SSOSettingsController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    
}