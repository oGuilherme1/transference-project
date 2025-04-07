<?php

declare(strict_types=1);

namespace App\Services\Auth;

use Hypervel\Support\Facades\JWT;

class AuthService implements AuthServiceInterface
{
    public function __construct()
    {
        //
    }

    public function login(array $credentials): array
    {
        return [
            'token' => 'token',
            'refresh_token' => 'refresh_token',
        ];
    }

    public function register(array $data): array
    {
        $secretKey = env('JWT_SECRET');

        $accessTokenPayload = [
            'iat' => time(),
            'exp' => time() + (60 * 60 * 24), // 1 day
            'scope' => 'access'
        ];
    
        $refreshTokenPayload = [
            'iat' => time(),
            'exp' => time() + (60 * 60 * 24 * 7), // 7 day
            'scope' => 'refresh'
        ];

        $token = JWT::encode($accessTokenPayload, $secretKey, 'HS256');
        $refreshToken = JWT::encode($refreshTokenPayload, $secretKey, 'HS256');

        return [
            'token' => $token,
            'refresh_token' => $refreshToken,
        ];
    }

    public function logout(): void
    {
        //
    }

    public function refresh(string $refreshToken): array
    {
        return [
            'token' => 'token',
            'refresh_token' => 'refresh_token',
        ];
    }
}