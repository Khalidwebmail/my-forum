<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignupRequest;
use App\Mail\Registration;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('JWT', ['except' => ['login', 'register', 'verifyUser']]);
    }

    /**
     * Get a JWT token via given credentials.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
//        $validator = \Validator::make($request->all(), [
//            'email'     => 'required|exists,user',
//            'password'  => 'required|min:8',
//        ],
//        [
//            'email.required'     => 'Please enter a valid email',
//            'password.required'  => 'Please enter password',
//        ]);
//
//        if($validator->fails()) {
//            $response = [
//                'success' => false,
//                'message' => $validator->messages()
//            ];
//            return response()->json($response, 404);
//        }

        $credentials = $request->only('email', 'password');

        if ($token = $this->guard()->attempt($credentials)) {
            return $this->respondWithToken($token);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    /**
     * Register new user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(SignupRequest $request)
    {
        $user = User::create($request->all());
        $token = $user->createToken('my_app_token')->plainTextToken;
        $res = [
            $user,
        ];
        \Mail::send(new Registration());
        return response()->json($res, 201);
    }
    /**
     * Get the authenticated User
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json($this->guard()->user());
    }

    /**
     * Log the user out (Invalidate the token)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        $this->guard()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function verifyUser(Request $request, $token)
    {
        $token_info = \DB::table('personal_access_tokens')->select("*")
            ->where('token', $token)->first();
        User::where('id', $token_info->tokenable_id)->update([
           'email_verified_at' => Carbon::now()
        ]);
        \DB::table('personal_access_tokens')->where('token', $token_info->token)->delete();
    }
    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken($this->guard()->refresh());
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
            'access_token'  => $token,
            'token_type'    => 'bearer',
            'expires_in'    => $this->guard()->factory()->getTTL() * 60,
            'user'          => auth()->user()->name
        ]);
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\Guard
     */
    public function guard()
    {
        return Auth::guard();
    }
}
