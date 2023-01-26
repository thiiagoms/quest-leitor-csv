<?php

declare(strict_types=1);

namespace Src\Controllers;

use Src\Services\UserService;

/**
 * User Controller
 *
 * @package Src\Controllers
 * @author  Thiago Silva <thiagom.devsec@gmail.com>
 * @version 1.0
 */
final class UserController
{
    /**
     * Init Controller with services
     *
     * @param UserService $userService
     */
    public function __construct(private UserService $userService)
    {
    }

    /**
     * Default user seeder
     *
     * @param string $fileName
     * @return void
     */
    public function seedUsers(string $fileName)
    {
        $this->userService->seedUsers($fileName);
    }
}
