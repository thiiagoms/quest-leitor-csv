<?php

declare(strict_types=1);

namespace Src\Repositories;

use Src\Contracts\UserContract;

final class UserRepository extends Repository implements UserContract
{
    protected string $table = 'users';

    public function userCreate(array $userData)
    {
        return $this->queryBuilder->insert($userData);
    }

    public function userSearch(string $userEmail)
    {
        return $this->queryBuilder->select("name = '{$userEmail}'");
    }

    public function userUpdate(int $userId, string $userNewEmail)
    {
        return $this->queryBuilder->update("id = {$userId}", $userNewEmail);
    }
}
