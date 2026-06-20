<?php

namespace App\Services;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function login(
        string $username,
        string $password
    ) {
        $user = User::where('email', $username)
            ->orWhere('name', $username)
            ->first();

        if (!$user || !Hash::check($password, $user->password)) {
            throw new Exception('Invalid credentials');
        }

        return $user
            ->createToken('api')
            ->accessToken;
    }
}
