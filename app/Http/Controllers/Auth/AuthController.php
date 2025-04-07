<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Commands\Auth\Register\AuthRegisterCommand;
use App\Commands\Auth\Register\AuthRegisterCommandHandler;
use App\Http\Controllers\AbstractController;
use App\Http\Requests\User\UserCreateRequest;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class AuthController
{
    public function __construct(protected AuthRegisterCommandHandler $commandHandler)
    {
        // 
    }

    public function login($request): ResponseInterface
    {
        return response('teste');
    }

    public function register(UserCreateRequest $request): ResponseInterface
    {
        try {
            $command = new AuthRegisterCommand(
                $request->input('first_name'),
                $request->input('last_name'),
                $request->input('document'),
                $request->input('email'),
                $request->input('password'),
            );
    
            $data = $this->commandHandler->handle($command);

            return response()->json([
                'data' => $data
            ], Response::HTTP_CREATED);

        } catch (Throwable $th) {
            return response()->json([
                'error' => $th->getMessage(),
                'line' => $th->getLine()
            ], $th->getCode());
        }
    }

    public function logout($request): ResponseInterface
    {
        return response('teste');
    }
}