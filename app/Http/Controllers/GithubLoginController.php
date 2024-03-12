<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class GithubLoginController extends Controller
{
    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }


    public function handleGithubCallback()
    {
        $SocialUser = Socialite::driver('github')->stateless()->user();
        $user = User::where('email', $SocialUser->email)->first();
        if(!$user)
        {
            $user = User::create(['name' => $SocialUser->name, 'email' => $SocialUser->email, 'password' => \Hash::make(rand(100000,999999))]);
        }

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
