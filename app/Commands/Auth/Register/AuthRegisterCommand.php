<?php

declare(strict_types=1);

namespace App\Commands\Auth\Register;

use App\Commands\AbstractCommand;

class AuthRegisterCommand extends AbstractCommand
{
    public function __construct(
        public readonly string $first_name,
        public readonly string $last_name,
        public readonly string $document,
        public readonly string $email,
        public readonly string $password
    ) 
    {
        // 
    }
}