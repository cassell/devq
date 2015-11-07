<?php

namespace Devq\Database;

interface DatabaseInterface
{
    /**
     * Executes an SQL DELETE statement on a table.
     *
     * Table expression and columns are not escaped and are not safe for user-input.
     *
     * @param  string $tableName The expression of the table on which to delete.
     * @param  int $primaryKey The deletion criteria. An associative array containing column-value pairs.
     * @return integer                   The number of affected rows.
     * @throws \InvalidArgumentException
     */
    public function delete($tableName, $primaryKey);

    /**
     * Prepares and executes an SQL query and returns the first row of the result
     * as an associative array.
     *
     * @param $sql
     * @param  array $params The query parameters.
     * @return array
     */
    public function fetchFirstRow($sql, array $params = array());

    /**
     * Prepares and executes an SQL query and returns the result as an associative array.
     *
     * @param  string $sql The SQL query.
     * @param  array $params The query parameters.
     * @return array
     */
    public function fetchRows($sql, array $params = array());

    /**
     * Executes an, optionally parametrized, SQL query.
     *
     * If the query is parametrized, a prepared statement is used.
     * If an SQLLogger is configured, the execution is logged.
     *
     * @param string $query The SQL query to execute.
     * @param array $params The parameters to bind to the query, if any.
     *
     * @throws \RuntimeException
     */
    public function executeQuery($query, array $params = array());

    /**
     * Inserts a table row with specified data.
     *
     * Table expression and columns are not escaped and are not safe for user-input.
     *
     * @param  string $tableName $table The name of the table to insert data into
     * @param  array $data An associative array containing column-value pairs.
     * @return int    The number of affected rows.
     */
    public function insert($tableName, array $data);

    /**
     * Executes an SQL UPDATE statement on a table.
     *
     * Table expression and columns are not escaped and are not safe for user-input.
     *
     * @param  string $tableName The name of the table to update
     * @param  array $data An associative array containing column-value pairs.
     * @param  int $primaryKey The primary key of the row to update
     * @return integer                   The number of affected rows
     * @throws \InvalidArgumentException
     */
    public function update($tableName, $primaryKey, array $data);

    /**
     * Returns the ID of the last inserted row or sequence value.
     *
     * @return string
     */
    function lastInsertId();

    /**
     * Initiates a transaction.
     *
     */
    function beginTransaction();

    /**
     * Commits a transaction.
     */
    function commit();

    /**
     * Rolls back the current transaction, as initiated by beginTransaction().
     *
     * @return boolean TRUE on success or FALSE on failure.
     */
    function rollBack();
}