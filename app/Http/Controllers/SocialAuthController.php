<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use Laravel\Socialite\Contracts\Provider;
use App\User;
use Auth;

class SocialAuthController extends Controller
{

    public function callback($provider)
    {

        $user = $this->createOrGetUser(Socialite::driver($provider));

        auth()->login($user);

        return redirect()->to('/');
    }

    public function redirect($provider)
    {
        return Socialite::driver($provider)->stateless()->redirect();
    }

    private function createOrGetUser(Provider $provider)
    {

        // $providerUser = $provider->user();
        // $providerUser = Socialite::with($provider)->user();
        $providerUser = Socialite::driver($provider)->stateless()->user();

        $providerName = class_basename($provider);

        $user = User::whereProvider($providerName)
            ->whereProviderId($providerUser->getId())
            ->first();

        if (!$user) {
            $user = User::create([
                'email' => $providerUser->getEmail(),
                'name' => $providerUser->getName(),
                'provider_id' => $providerUser->getId(),
                'provider' => $providerName
            ]);
        }

        return $user;
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/');
    }
}
