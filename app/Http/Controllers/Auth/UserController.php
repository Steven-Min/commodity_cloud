<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Get authenticated user.
     */
    public function current(Request $request)
    {
    	$user = User::where('id', $request->user()->id)->with('guest', 'userAvatars', 'cast', 'favorites', 'favoritesTo', 'footPrints')->first();
        return response()->json($user);
    }
}
