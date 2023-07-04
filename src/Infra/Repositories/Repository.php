<?php

declare(strict_types=1);

namespace Quest\Infra\Repositories;

use Quest\Infra\Database\QueryBuilder;

/**
 * Default Repository
 *
 * @package Quest\Infra\Repositories
 * @author  Thiago <thiiagoms@proton.me>
 * @version 1.1
 */
abstract class Repository extends QueryBuilder
{
    /**
     * @var string
     */
    protected string $table = '';
}
