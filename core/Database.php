<?php

namespace Core;

use PDO;

class Database {
    private $pdo;
    private $stmt;

    public function __construct() {
        $config = require __DIR__ . '/../config/config.php';
        
        $dsn = $config['dsn'];
        $username = $config['username'];
        $password = $config['password'];

        try {
            $this->pdo = new PDO($dsn, $username, $password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ]);
        } catch (\PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    public function query($sql, $params = []) {
        $this->stmt = $this->pdo->prepare($sql);
        $this->stmt->execute($params);
    }

    public function fetchAll() {
        return $this->stmt->fetchAll();
    }

    public function fetch() {
        return $this->stmt->fetch();
    }
}

/*
Use Connection Database in App Controller

	use Core\Database; // Adding
	class HomeController .... {
		// Adding
		private $db;
		public function __construct() {
			parent::__construct();
			$this->db = new Database();
		}
	}
*/