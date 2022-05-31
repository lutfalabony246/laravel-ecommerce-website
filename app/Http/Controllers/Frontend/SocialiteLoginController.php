<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SocialiteLoginController extends Controller
{

// Google Login
public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

// Google callback
public function handleGoogleCallback()
{

    $user = Socialite::driver('google')->stateless()->user();
    $this->_registerOrLoginUser($user);

    return redirect()->route('dashboard');
    
}

// Facebook Login
    public function redirectToFacebook()
    {
     
        return Socialite::driver('facebook')->redirect();
    }

// Facebook callback
    public function handleFacebookCallback()
    {

        $user = Socialite::driver('facebook')->stateless()->user();
        $this->_registerOrLoginUser($user);

        return redirect()->route('dashboard');
        
    }
    
// Twitter Login Section

// Twitter Login
    public function redirectToTwitter()
    {
        return Socialite::driver('twitter')->redirect();
    }

// Twitter callback
    public function handleTwitterCallback()
    {

        $user = Socialite::driver('twitter')->stateless()->user();
        $this->_registerOrLoginUser($user);

        return redirect()->route('dashboard');
        
    }

    protected function _registerOrLoginUser($data)
    {
        $user = User::where('email', '=',  $data->email)->first();
        if(!$user){
            $user = new User();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->provider_id = $data->id;
            $user->avatar = $data->avatar;
            $user->save();
        }

        Auth::login($user);
    }

}
