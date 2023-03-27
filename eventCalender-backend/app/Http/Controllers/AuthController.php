<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Login user with Google or Facebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        // Validate the user input
        $validated = $request->validate([
            'provider' => 'required|string',
            'access_token' => 'required|string',
        ]);

        // Authenticate the user
        if ($validated['provider'] == 'google') {
            // Authenticate with Google
            $user = Auth::guard('google')->user($validated['access_token']);
        } else if ($validated['provider'] == 'facebook') {
            // Authenticate with Facebook
            $user = Auth::guard('facebook')->user($validated['access_token']);
        }

        // Return the user data
        return response()->json([
            'user' => $user,
            'access_token' => $user->createToken('auth_token')->accessToken,
        ]);
    }
}
