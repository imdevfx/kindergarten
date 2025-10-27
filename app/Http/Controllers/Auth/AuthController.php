<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required|exists:users,login',
            'password' => 'required',
        ]);

        if (Auth::attempt(['login' => $request->login, 'password' => $request->password])) {
            $user = User::query()
                ->where('login', $request->login)
                ->first();
            $token = $user->createToken('token-name', [$user->login])->plainTextToken;
            return $this->successResponse([
                'token' => $token,
            ], new UserResource($user));
        }
        return $this->errorResponse('Login yoki parolingiz xato!');
    }
}
