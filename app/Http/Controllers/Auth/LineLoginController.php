<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class LineLoginController extends Controller
{
    public function redirectToLine()
    {
        return Socialite::driver('line')->redirect();
    }

    public function handleLineCallback()
    {
        $user = Socialite::driver('line')->user();
        
        return response()->json([
            'name' => $user->getName(),
            'email' => $user->getEmail(),
        ]);
    }
}