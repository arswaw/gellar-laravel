<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use App\Facades\UserSession;
use Illuminate\Http\Request;

class CheckToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        // parse json body from request
        $data = json_decode($request->getContent(), true);

        // quit right now if required elements are missing
        UserSession::checkParameters(['user_id', 'token']);

        // attempt to validate requested user ID and token
        $user = User::where('id', $data['user_id'])
            ->where('remember_token', $data['token'])
            ->first();

        // return error if validation fails
        if (!$user) {
            return response()->json(['error' => 'Invalid Token'], 401);
        }

        // store validated user in service container singleton
        UserSession::setUser($user);

        // return success
        return $next($request);
    }
}
