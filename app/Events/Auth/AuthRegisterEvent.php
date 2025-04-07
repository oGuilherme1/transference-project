<?php

declare(strict_types=1);

namespace App\Events\Auth;

use Hypervel\Foundation\Events\Dispatchable;

class AuthRegisterEvent
{
    use Dispatchable;

    /**
     * Create a new event instance.
     */
    public function __construct(array $data)
    {
        //
    }
}
