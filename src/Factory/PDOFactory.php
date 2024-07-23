<?php

namespace Els\Factory;

use Els\Interfaces\Database;

class PDOFactory implements Database
{
    private string $host;
    private string $dbName;
    private string $userName;
    private string $password;

    private string $port;

    public function __construct(string $host = "db", string $port="3306", string $dbName = "mariadb:10.11", string $userName = "root", string $password = "root")
    {
        $this->host = $host;
        $this->port = $port;
        $this->dbName = $dbName;
        $this->userName = $userName;
        $this->password = $password;
    }

    public function getMySqlPDO(): \PDO
    {
        return new \PDO("mysql:host=" . $this->host . ":" . $this->port . ";dbname=" . $this->dbName, $this->userName, $this->password);
    }

    public function getPostgresPDO(): \PDO
    {
        $dsn = "pgsql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->dbName;
        // make a database connection
        return new \PDO($dsn, $this->userName, $this->password, [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);
    }
}
