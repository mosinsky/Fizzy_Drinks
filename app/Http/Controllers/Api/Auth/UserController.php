<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Requests\Api\Auth\RegisterRequest;

class UserController extends Controller
{
    /**
     * Register new user if provided data is valid.
     *
     * @param RegisterRequest $request
     * @return Response
     */
    public function register(RegisterRequest $request): Response
    {
        $data = $request->validated();

        $user = User::create($data);

        $token = $user->createToken('api_token')->plainTextToken;

        $user->update(['api_token' => $token]);

        $response = [
            'user'  => $user,
            'token' => $token,
        ];

        return response($response, 201);
    }

    /**
     * Create token for user if user of provided credentials exists.
     *
     * @param LoginRequest $request
     * @return Response
     */
    public function login(LoginRequest $request): Response
    {
        $data = $request->validated();

        $user = Auth::firstWhere(['email' => $data['email']]);

        if (!$user || !Hash::check($data['password'], $user->password)) {
            return response([
                'message' => 'Bad credentials provided.',
            ], 401);
        }

        $token = $user->createToken('api_token')->plainTextToken;
        $user->update(['api_token' => $token]);

        return response([
            'user'  => $user,
            'token' => $token,
        ]);
    }

    /**
     * Logout currently logged user.
     *
     * @param Request $request
     * @return Response
     */
    public function logout(Request $request): Response
    {
        auth()->user()->tokens()->delete();

        return response([
            'message' => 'Logged out.',
        ]);
    }
}