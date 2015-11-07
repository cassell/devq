<?php
namespace Devq\Database\Connection;

interface DatabaseConnectionInterface extends \Doctrine\DBAL\Driver\Connection
{
    /**
     * Prepares and executes an SQL query and returns the first row of the result
     * as an associative array.
     *
     * @param string $statement The SQL query.
     * @param array  $params    The query parameters.
     * @param array  $types     The query parameter types.
     *
     * @return array
     */
    public function fetchAssoc($statement, array $params = array(), array $types = array());

    /**
     * Prepares and executes an SQL query and returns the result as an associative array.
     *
     * @param string $sql    The SQL query.
     * @param array  $params The query parameters.
     * @param array  $types  The query parameter types.
     *
     * @return array
     */
    public function fetchAll($sql, array $params = array(), $types = array());
}
