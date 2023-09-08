<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UserRegisterRequest;

class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * The user has been registered.
     */
    protected function registered(Request $request, User $user)
    {
        if ($user instanceof MustVerifyEmail) {
            return response()->json(['status' => trans('verification.sent')]);
        }

        return response()->json($user);
    }

    /**
     * Get a validator for an incoming registration request.
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|email:filter|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     */
    protected function create(array $data): User
    {
        return User::create([
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

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
