<?php

declare(strict_types=1);

namespace Src\Repositories;

use Src\Database\QueryBuilder;

/**
 * Abstract Repository
 *
 * @package Src\Repositories
 * @author  Thiago Silva <thiagom.devsec@gmail.com>
 * @version 1.0
 */
abstract class Repository
{
    /**
     * Current table
     *
     * @var string
     */
    protected string $table;

    /**
     * Database querybuilder
     *
     * @var object
     */
    protected $queryBuilder;

    /**
     * Init repository with service
     * 
     */
    public function __construct()
    {
        $this->queryBuilder =  new QueryBuilder($this->table);
    }
}
