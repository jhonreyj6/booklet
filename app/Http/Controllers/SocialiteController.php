<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\Models\User;
use Auth;

class SocialiteController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $data = Socialite::driver($provider)->user();
        $user = User::where([
            "provider" => $provider,
            "provider_id" => $data->getId(),
        ])->first();

        if (!$user) {
            $user = User::create([
                'first_name' => $data->getName(),
                'email' => $data->getEmail(),
                'provider_token' => $data->token,
                'provider_id' => $data->getId(),
                'provider' => $provider
            ]);
        }

        Auth::login($user);
        return redirect('/');
    }
}
