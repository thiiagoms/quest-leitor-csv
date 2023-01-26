<?php

declare(strict_types=1);

namespace Src\Database;

use PDOException;

/**
 * QueryBuilder package
 *
 * @package Src\Database
 * @author  Thiago Silva <thiagom.devsec@gmail.com>
 * @version 1.0
 */
final class QueryBuilder
{
    /**
     * Database object
     *
     * @var object
     */
    private object $db;

    /**
     * Init QueryBuilder with Database connection
     *
     * @param string $table
     */
    public function __construct(private string $table)
    {
        $this->db = (new Database())->open();
    }

    /**
     * Execute query
     *
     * @param string $query
     * @param array $params
     * @return PDOStatement
     */
    private function execute(string $query, array $params = [])
    {
        try {
            $stmt = $this->db->prepare($query);
            $stmt->execute($params);
            return $stmt;
        } catch (PDOException $e) {
        }
    }

    /**
     * Custom select
     *
     * @param string|null $where
     * @param string|null $order
     * @param string $fields
     * @return array
     */
    public function select(?string $where = null, ?string $order = null, string $fields = "*"): array
    {
        $where = !is_null($where) ? "WHERE {$where}" : '';

        $query = "SELECT {$fields} FROM {$this->table} {$where}";

        $stmt = $this->execute($query);

        return !is_null($stmt) ? $stmt->fetchAll() : [];
    }

    /**
     * Insert Query builder
     *
     * @param array $values
     * @return void
     */
    public function insert(array $values)
    {
        $fields = array_keys($values);
        $binds  = array_pad([], count($fields), '?');

        $query = 'INSERT INTO '.$this->table.' ('.implode(',', $fields).') VALUES ('.implode(',', $binds).')';

        $this->execute($query, array_values($values));

        return $this->db->lastInsertId();
    }

    /**
     * Custom update
     *
     * @param string $where
     * @param string $newEmailData
     * @return void
     */
    public function update(string $where, string $newEmailData)
    {
        $query = "UPDATE {$this->table} SET email = '{$newEmailData}' WHERE {$where}";

        $this->execute($query);
    }
}
