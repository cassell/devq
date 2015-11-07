<?php
namespace Devq\Database\Connection;

use Doctrine\DBAL\Connection;

class DatabaseConnection extends Connection implements DatabaseConnectionInterface
{
    public function __construct($host, $name, $user, $password, \Doctrine\DBAL\Driver\PDOMySql\Driver $driver)
    {
        parent::__construct([
            'dbname' => $name,
            'user' => $user,
            'password' => $password,
            'host' => $host,
            'driver' => 'pdo_mysql'
        ], $driver, null, null);
    }
}
