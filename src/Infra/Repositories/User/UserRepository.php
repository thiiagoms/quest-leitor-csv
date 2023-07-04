<?php

namespace Quest\Infra\Repositories\User;

use Quest\Infra\Repositories\Repository;

/**
 * User repository
 *
 * @package Quest\Infra\Repositories\File
 * @author  Thiago <thiiagoms@proton.me>
 * @version 1.1
 */
class UserRepository extends Repository
{
    /**
     * @var string
     */
    protected string $table = 'users';

    /**
     * @param string $fields
     * @param array $where
     * @return false|array
     */
    public function find(string $fields, array $where): false|array
    {
        return $this->select($fields, $where);
    }

    /**
     * @param array $params
     * @return void
     */
    public function store(array $params): void
    {
        $this->insert($params);
    }
}
