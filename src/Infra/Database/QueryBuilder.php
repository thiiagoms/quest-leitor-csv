<?php

declare(strict_types=1);

namespace Quest\Infra\Database;

use PDOStatement;
use PrettyPrint\Printer;
use Quest\Helpers\Logger;
use Quest\Infra\Database\Connection\Connection;

/**
 * Database query-builder
 *
 * @package Quest\Infra\Database
 * @author  Thiago <thiiagoms@proton.me>
 * @version 1.1
 */
class QueryBuilder extends Connection
{
    /**
     * @var string
     */
    protected string $table;

    public function __construct()
    {
        $this->open();
    }

    /**
     * @param string $query
     * @param array $params
     * @return bool|PDOStatement
     */
    private function execute(string $query, array $params = []): bool|PDOStatement
    {
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute($params);

            return $stmt;
        } catch (\PDOException $e) {
            Printer::error("ERROR: Failed to execute {$query}");
            Logger::log($e->getMessage());
            exit;
        }
    }

    /**
     * @param array|null $where
     * @return array
     */
    private function bindWhere(?array $where): array
    {
        $whereClause = '';
        $bindValues = [];

        if (!is_null($where)) {
            $conditions = [];

            foreach ($where as $column => $value) {
                $conditions[] = "{$column} = ?";
                $bindValues[] = $value;
            }

            $whereClause = "WHERE " . implode(' AND ', $conditions);
        }

        return [$whereClause, $bindValues];
    }

    /**
     * @param string $fields
     * @param array|null $where
     * @return array|false
     */
    public function select(string $fields, array $where = null): array|false
    {
        list($whereClause, $bindValues) = $this->bindWhere($where);

        $query = "SELECT {$fields} FROM {$this->table} {$whereClause}";

        return $this->execute($query, $bindValues)->fetchAll();
    }

    /**
     * @param array $params
     * @return void
     */
    public function insert(array $params = []): void
    {
        $fields = array_keys($params);
        $values = array_pad([], count($fields), '?');

        $newFields = implode(',', $fields);
        $newValues = implode(',', $values);

        $query = "INSERT INTO {$this->table} ({$newFields}) VALUES ({$newValues})";

        $this->execute($query, array_values($params));
    }

    /**
     * @param string $email
     * @param array $where
     * @return void
     */
    public function update(string $email, array $where): void
    {
        list($whereClause, $bindValues) = $this->bindWhere($where);

        $query = "UPDATE {$this->table} SET email = '{$email}' {$whereClause}";

        $this->execute($query, $bindValues);
    }
}
