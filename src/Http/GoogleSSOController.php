<?php

namespace Jonnx\LaravelSparkSSO\Http;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Socialite;
use Auth;
use App\User;

class GoogleSSOController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }
    
    public function callback(Request $request) {
        
        $googleUser = Socialite::driver('google')->user();
        $user = User::where('email', $googleUser->email)->first();
        
        // register user if necessary
        if(!$user)
        {
            return redirect('/register');
        }
    
        // auto-add user to teams based on email domain
        // @todo: implement this
    
        // login user and redirect
        Auth::login($user);
        return redirect('/home');
        
    }
    
}