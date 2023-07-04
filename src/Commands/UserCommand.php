<?php

declare(strict_types=1);

namespace Quest\Commands;

use Quest\Domain\Services\UserService;

/**
 * User command
 *
 * @package Quest\Commands
 * @author Thiago <thiiagoms@proton.me>
 * @version 1.1
 */
class UserCommand
{
    /**
     * @param UserService $userService
     */
    public function __construct(private UserService $userService)
    {
    }

    /**
     * @return void
     */
    public function seed(): void
    {
        $this->userService->seed();
    }
}
