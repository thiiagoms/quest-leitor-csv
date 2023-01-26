<?php

declare(strict_types=1);

namespace Src\Database;

use PDO;
use PDOException;
use PrettyPrint\Printer;

/**
 * Database Package
 *
 * @package Src\Database
 * @author  Thiago Silva <thiagom.devsec@gmail.com>
 * @version 1.0
 */
class Database
{
    /**
     * Database Host
     *
     * @var string
     */
    private string $dbHost;

    /**
     * Database Port
     *
     * @var integer
     */
    private int $dbPort;

    /**
     * Database Name
     *
     * @var string
     */
    private string $dbName;

    /**
     * Database User
     *
     * @var string
     */
    private string $dbUser;

    /**
     * Database Pass
     *
     * @var string
     */
    private string $dbPass;

    /**
     * Database object connection
     */
    private PDO $conn;

    /**
     * Init database with credentials
     *
     * @return void
     */
    public function __construct()
    {
        $this->dbHost = $_SERVER['DATABASE_HOST'];
        $this->dbPort = (int) $_SERVER['DATABASE_PORT'];
        $this->dbName = $_SERVER['DATABASE_NAME'];
        $this->dbUser = $_SERVER['DATABASE_USER'];
        $this->dbPass = $_SERVER['DATABASE_PASS'];
    }

    public function open(): PDO
    {
        try {
            $this->conn = new PDO(
                "mysql:host={$this->dbHost};port={$this->dbPort};dbname={$this->dbName}",
                $this->dbUser,
                $this->dbPass
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $this->conn;
        } catch (PDOException $e) {
            Printer::error("ERROR {$e->getMessage()}\n");
        }
    }
}
