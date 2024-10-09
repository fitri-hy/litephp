<?php

namespace App\Core;

use PDO;
use PDOException;

class Database {
    private $host;
    private $dbname;
    private $user;
    private $password;
    private $connection;

    public function __construct() {
        $config = require __DIR__ . '/../config/database.php';
        $this->host = $config['host'];
        $this->dbname = $config['dbname'];
        $this->user = $config['user'];
        $this->password = $config['password'];
        $this->connect();
    }

    private function connect() {
        try {
            $this->connection = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->user, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->connection;
    }
}
