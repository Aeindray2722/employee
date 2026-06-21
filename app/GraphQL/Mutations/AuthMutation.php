<?php

namespace App\GraphQL\Mutations;

use App\Services\AuthService;

class AuthMutation
{
    /**
     * Authenticate a user and generate an access token.
     *
     * @param mixed $_
     * @param array $args
     * @return array
     */
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
