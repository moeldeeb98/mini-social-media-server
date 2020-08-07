<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;


    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function sendLoginResponse(Request $request): Response
    {
        $this->clearLoginAttempts($request);

        $user = $request->user();
        $accessToken = $user->createToken('authToken')->accessToken;
        return new Response([
            'data' => [
                'access_token' => $accessToken,
                'user' => $user
            ]
        ], 200);
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request): Response
    {
        $request->user()->token()->revoke();

        return new Response('', 204);
    }
}
