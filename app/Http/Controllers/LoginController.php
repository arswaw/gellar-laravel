<?php

namespace App\Http\Controllers;

use App\Facades\UserSession;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Validates login requests
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        // validate request vars
        UserSession::checkParameters(['email', 'password']);

        // parse login credentials out of request body
        $data = json_decode($request->getContent(), true);

        // attempt to find user matching sent credentials
        $user = User::where('email', $data['email'])
            ->first();

        // if sent email is wrong, peace out
        if (!$user) {
            return response()->json(['error' => 'Invalid Credentials'], 401);
        }

        // if sent password is wrong, peace out
        if (Hash::check($data['password'], $user->remember_token)) {
            return response()->json(['error' => 'Invalid Credentials'], 401);
        }

        // otherwise, make a new token and store it in the db
        $newToken = str_random(16);
        $user->remember_token = $newToken;
        $user->save();

        // return token and user ID to frontend app
        $output = [
            'data' => [
                'token' => $newToken,
                'user_id' => $user->id
            ]
        ];
        return response()->json($output);
    }
}