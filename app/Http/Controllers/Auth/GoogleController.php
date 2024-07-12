<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class GoogleController extends Controller
{

    public function redirectToGoogle() 
    {
        return Socialite::driver('google')->redirect();    
    }

    public function handleGoogleCallback() 
    {
        $user = Socialite::driver('google')->user();
        $this->_registerOrLoginUser($user);
        return redirect()->intended('dashboard');
    }

    public function _registerOrLoginUser($data) 
    {
        $user = User::where('email', $data->email)->first();

        if(!$user){
            $user = new User();
            $user->name = $data->name;
            $user->role_id = 2;
            $user->email = $data->email;
            $user->email_verified_at = now();
            $user->provider_id = $data->id;
            $user->password = Str::random(16); // Generate a random password
            $user->status = '1';
            $user->profile_photo_path = $data->avatar;
            
            $user->save();
        } else {
            $update = false;
    
            if (!empty($data->id)) {
                $user->provider_id = $data->id;
                $update = true;
            }
    
            if (!empty($data->avatar)) {
                $user->profile_photo_path = $data->avatar;
                $update = true;
            }
    
            if ($update) {
                $user->save();
            }
        }

        Auth::login($user);
    }

}