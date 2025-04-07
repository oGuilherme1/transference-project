<?php

declare(strict_types=1);

namespace App\Services\Auth;

interface AuthServiceInterface
{
    public function login(array $credentials): array;

    public function register(array $data): array;

    public function logout(): void;

    public function refresh(string $refreshToken): array;


}