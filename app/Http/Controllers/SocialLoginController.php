<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class SocialLoginController extends Controller
{
    public function redirectTo($provider)
    {
        return Socialite::driver($provider)->redirect();
    }


    public function handleCallback($provider)
    {
        $providerUser = Socialite::driver($provider)->stateless()->user();
        $user = User::where('email', $providerUser->email)->first();
        //dd($providerUser);
        
        if(!$user)
        {
            if($provider == 'github'){
                //some time in github name null received
                $name = $providerUser->name ?? $providerUser->nickname;
            }else{
                $name = $providerUser->name;
            }
            $user = User::create([
                'name' => $name, 'email' => $providerUser->email, 
                'password' => \Hash::make(rand(100000,999999)),
                'provider' => $provider,
                'provider_id' => $providerUser->id,
            ]);
        }

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
