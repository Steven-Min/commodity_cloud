<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UserRegisterRequest;
use Illuminate\Auth\Events\Registered;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Login
     */
    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $id = Auth::user()->id;
            $user = User::find($id);
            $success = true;
            $layout =  'layout';
            $message = 'User login successfully';
        } else {
            $user = '';
            $success = false;
            $layout =  'login';
            $message = 'Unauthorised';
        }

        // response
        $response = [
            'user' => $user,
            'success' => $success,
            'layout' =>  $layout,
            'message' => $message,
        ];
        return response()->json($response);
    }

    public function checkAuth()
    {
        if (Auth::check()) {
            $id = Auth::user()->id;
            $user = User::find($id);
            $success = true;
            $layout =  'layout';
            $message = 'User login successfully';
        } else {
            $user = '';
            $success = false;
            $layout = 'login';
            $message = 'Unauthorised';
        }

        // response
        $response = [
            'user' => $user,
            'success' => $success,
            'layout' =>  $layout,
            'message' => $message,
        ];
        return response()->json($response);
    }

    /**
     * logout
     */
    public function logout()
    {
        try {
            $user = '';
            Session::flush();
            $success = false;
            $layout = 'login';
            $message = 'Successfully logged out';
        } catch (\Illuminate\Database\QueryException $ex) {
            $user = '';
            $success = false;
            $layout = 'login';
            $message = $ex->getMessage();
        }

        // response
        $response = [
            'user' => $user,
            'success' => $success,
            'layout' =>  $layout,
            'message' => $message,
        ];
        return response()->json($response);
    }

    /**
     * 新規登録
     */
    public function register(UserRegisterRequest $request) {
        $user_data = [
            'email' => $request->email,
            'password' => bcrypt($request->password), // パスワードをハッシュ化
        ];
        $user = User::create($user_data);
        $profile_data = [
            'zipcode' => $request->zipcode,
            'prefecture' => $request->prefecture,
            'city' => $request->city,
            'street' => $request->street,
            'birthday' => $request->birthday,
            'gender' => $request->gender,
            'available_notification' => $request->available_notification
        ];
        $user->profile()->create($profile_data);
        $user->sendEmailVerificationNotification();

        return response()->json([
            'user' => $user,
            'success' => true,
        ]);
    }
}
