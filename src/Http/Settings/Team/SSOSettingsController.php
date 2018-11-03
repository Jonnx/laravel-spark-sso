<?php

namespace Jonnx\LaravelSparkSSO\Http\Settings\Team;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\User;
use App\Team;

class SSOSettingsController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    
    public function show(Request $request, Team $team) {
        
        if(!$request->user()->ownsTeam($team)) {
            return redirect('/home');
        }
        
        return view('laravel-spark-sso::settings', ['team' => $team]);
        
    }
    
    public function update(Request $request, Team $team)
    {
        if(!$request->user()->ownsTeam($team)) {
            return redirect('/home');
        }
        
        $team->sso_email_domain = $request->sso_email_domain;
        $team->save();
        
        return redirect('/settings/teams/'.$team->id.'/sso');
    }
    
}