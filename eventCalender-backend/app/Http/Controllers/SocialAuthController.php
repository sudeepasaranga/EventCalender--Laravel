<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        $existingUser = User::where('email', $user->getEmail())->first();
        if ($existingUser) {
            auth()->login($existingUser);
        } else {
            $newUser = new User;
            $newUser->name = $user->getName();
            $newUser->email = $user->getEmail();
            $newUser->google_id = $user->getId();
            $newUser->save();

            auth()->login($newUser);
        }

        return redirect('/events');
    }

    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();

        $existingUser = User::where('email', $user->getEmail())->first();
        if ($existingUser) {
            auth()->login($existingUser);
        } else {
            $newUser = new User;
            $newUser->name = $user->getName();
            $newUser->email = $user->getEmail();
        }
    }
}
