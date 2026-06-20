<?php

namespace App\GraphQL\Mutations;

use App\Services\AuthService;

class AuthMutation
{
    public function login($_, array $args)
    {
        return [
            'token' => app(AuthService::class)
                ->login(
                    $args['username'],
                    $args['password']
                )
        ];
    }
}
