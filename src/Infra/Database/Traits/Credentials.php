<?php

declare(strict_types=1);

namespace Quest\Infra\Database\Traits;

/**
 * Database credentials trait
 *
 * @package Quest\Infra\Database\Traits
 * @author  Thiago <thiiagoms@proton.me>
 * @version 1.1
 */
trait Credentials
{
    /**
     * Assign database credentials
     *
     * @return void
     */
    public function load(): void
    {
        $this->dbHost = $_ENV['DATABASE_HOST'];
        $this->dbPort = (int) $_ENV['DATABASE_PORT'];
        $this->dbName = $_ENV['DATABASE_NAME'];
        $this->dbUser = $_ENV['DATABASE_USER'];
        $this->dbPass = $_ENV['DATABASE_PASS'];
    }
}
