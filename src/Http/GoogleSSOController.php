<?php

namespace Jonnx\LaravelSparkSSO\Http;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Socialite;
use Auth;
use App\User;
use App\Team;

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
            $user = new User;
            $user->name = $googleUser->name;
            $user->email = $googleUser->email;
            $user->photo_url = $googleUser->avatar;
            $user->password = str_random(10);
            $user->save();
        }
    
        // auto-add user to teams based on email domain
        $emailDomain = substr($user->email, strrpos($user->email, '@')+1, strlen($user->email));
        $teams = Team::where('sso_email_domain', $emailDomain)->get();
        foreach($teams as $team) {
            
            // check if user is on team
            if(!$user->ownsTeam($team)) {
                if(!$user->onTeam($team)) {
                    // @todo make configurable default role
                    $user->teams()->sync([$team->id => ['role'=> 'member']]);
                }
            }
            
            // make sure user has active team on first login
            if(is_null($user->current_team_id))
            {
                $user->fresh()->switchToTeam($team);
            }
            
        }
    
        // login user and redirect
        Auth::login($user);
        return redirect('/home');
        
    }
    
}