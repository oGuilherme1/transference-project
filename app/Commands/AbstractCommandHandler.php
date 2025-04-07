<?php

declare(strict_types=1);

namespace App\Commands;

interface AbstractCommandHandler
{
    public function handle(AbstractCommand $command): array;
}