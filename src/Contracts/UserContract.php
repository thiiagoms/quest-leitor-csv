<?php

declare(strict_types=1);

namespace Src\Contracts;

/**
 * User Contract
 *
 * @package Src\Contracts
 * @author  Thiago Silva <thiagom.devsec@gmail.com>
 * @version 1.0
 */
interface UserContract
{
    /**
     * Create new User
     *
     * @param array $userData
     * @return void
     */
    public function userCreate(array $userData);

    /**
     * Update exists user
     *
     * @param integer $userId
     * @param string $newUserEmail
     * @return void
     */
    public function userUpdate(int $userId, string $newUserEmail);
}
