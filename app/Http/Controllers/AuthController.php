<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Interfaces\AuthRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Hash, Auth};

class AuthController extends Controller
{
    private AuthRepositoryInterface $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository) {
        $this->authRepository = $authRepository;
    }

    public function register(Request $request)
    {
        $validatedRequest = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed',
        ]);
        $validatedRequest['password'] = Hash::make($validatedRequest['password']);

        $user = $this->authRepository->registerUser($validatedRequest);

        Auth::login($user);

        return response()->json(['user' => $user, 'token' => $user->api_token->token], 201);
    }

    public function login(Request $request)
    {
        $validatedRequest = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($validatedRequest)) {
            $request->session()->regenerate();

            $this->authRepository->setToken(auth()->user());

            return response()->json(['user' => auth()->user(), 'token' => auth()->user()->api_token->token], 201);
        }

        return response()->json(['message' => 'Given data was invalid'], 401);
    }

    public function logout()
    {
        $this->authRepository->dropToken(auth()->user());

        return response()->json(['message' => 'You logged out'], 200);
    }
}
