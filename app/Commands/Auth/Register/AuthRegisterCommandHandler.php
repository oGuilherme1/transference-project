<?php

declare(strict_types=1);

namespace App\Commands\Auth\Register;

use App\Commands\AbstractCommand;
use App\Commands\AbstractCommandHandler;
use App\Services\Auth\AuthService;

class AuthRegisterCommandHandler 
{
    public function __construct(protected AuthService $service)
    {
        //
    }

    public function handle(AuthRegisterCommand $command): array
    {
        $data = $this->service->register($command->toArray());

        return event(new UserRegistered($user));

    }
}