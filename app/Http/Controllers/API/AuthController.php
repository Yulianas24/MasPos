<?php

namespace App\Http\Controllers\API;

use App\Models\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => false,
            'message' => 'unauthorized',
        ], 401);
    }

    public function register(Request $request)
    {
        try {
            $this->validate($request, [
                'username' => 'required',
                'password' => 'required',
            ]);

            $user = User::create([
                'username' => $request->username,
                'password' => bcrypt($request->password)
            ]);

            $token = $user->createToken('PassportAuth')->accessToken;

            return response()->json(['token' => $token], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'register failed',
                'data' => $th
            ], 401);
        }
    }

    /**
     * Login Req
     */
    public function login(Request $request)
    {
        try {
            $data = [
                'username' => $request->username,
                'password' => $request->password
            ];

            if (auth()->attempt($data)) {
                $token = auth()->user()->createToken('PassportAuth')->accessToken;
                return response()->json(['token' => $token], 200);
            } else {
                return response()->json(['error' => 'Unauthorised'], 401);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'login failed',
            ], 401);
        }
    }

    public function userInfo()
    {

        try {
            $user = auth()->user();
            return response()->json(['user' => $user], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'error',
                'data' => $th
            ], 401);
        }
    }
}
