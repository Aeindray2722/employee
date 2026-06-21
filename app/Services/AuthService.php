<?php

namespace App\Services;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    /**
     * Authenticate a user using email or username
     * and generate a Passport access token.
     *
     * @param string $username
     * @param string $password
     * @return string
     * @throws Exception
     */
    public function login(
        string $username,
        string $password
    ) {
        $user = User::where('email', $username)
            ->orWhere('name', $username)
            ->first();

        // Validate user credentials
        if (!$user || !Hash::check($password, $user->password)) {
            throw new Exception('Invalid credentials');
        }

        // Generate and return access token
        return $user
            ->createToken('api')
            ->accessToken;
    }
}
