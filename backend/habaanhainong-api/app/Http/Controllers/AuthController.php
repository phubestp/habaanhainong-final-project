<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth('api')->refresh());
    }

    public function register(Request $request) {
        $username = $request->get('username');
        $password = $request->get('password');
        $email = $request->get('email');
        $firstname = $request->get('firstname');
        $lastname = $request->get('lastname');
        $isAdmin = false;
        $phone_np = $request->get('phone_no');
        $facebook = $request->get('facebook');
        $instagram = $request->get('instagram');
        $line = $request->get('line');

        $user = new User();
        $user->username = $username;
        $user->password = $password;
        $user->email = $email;
        $user->firstname = $firstname;
        $user->lastname = $lastname;
        $user->isAdmin = $isAdmin;
        $user->phone_no = $phone_np;
        $user->facebook = $facebook;
        $user->instagram = $instagram;
        $user->line = $line;
        $user->save();
        $user->refresh();
        return $user;
    }

    public function resetPassword(Request $request)
    {
        $username = $request->get('username');
        $new_password = $request->get('new_password');
        
        $user = User::where('username', $username)->first();
        $user->password = $new_password;
        return $user;
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
}
