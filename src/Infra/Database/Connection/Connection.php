<?php

namespace Quest\Infra\Database\Connection;

use PDO,

PDOException;
use PrettyPrint\Printer;
use Quest\Helpers\Logger;
use Quest\Infra\Database\Traits\Credentials;

/**
 * Database connection
 *
 * @package Quest\Infra\Database\Connection
 * @author  Thiago <thiiagoms@proton.me>
 * @version 1.1
 */
class Connection
{
    use Credentials;

    /**
     * @var string
     */
    protected string $dbHost;

    /**
     * @var int
     */
    protected int $dbPort;

    /**
     * @var string
     */
    protected string $dbName;

    /**
     * @var string
     */
    protected string $dbUser;

    /**
     * @var string
     */
    protected string $dbPass;

    /**
     * @var PDO
     */
    protected PDO $conn;

    /**
     * @return PDO
     */
    protected function open(): PDO
    {
        $this->load();

        try {
            $this->conn = new PDO(
                "mysql:host={$this->dbHost};port={$this->dbPort};dbname={$this->dbName}",
                $this->dbUser,
                $this->dbPass
            );
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $this->conn;
        } catch (PDOException $exception) {
            Printer::error("Database connection error");
            Logger::log($exception->getMessage());
            exit;
        }
    }
}
