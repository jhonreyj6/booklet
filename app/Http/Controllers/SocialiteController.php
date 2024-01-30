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
        ])->orWhere('email', $data->email)->first();

        if (!$user) {
            $user = User::create([
                'first_name' => $data->name,
                'email' => $data->email,
                'provider_id' => $data->id,
                'provider' => $provider,
            ]);
        }

        Auth::login($user);
        return redirect('/');
    }
}
