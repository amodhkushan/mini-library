<?php

class DBConnection
{
    private $server;
    private $username;
    private $password;
    private $database;
    public $conn;

    public function __construct()
    {
        $this->server = getenv('DB_HOST') ?: $_ENV['DB_HOST'] ?? $_SERVER['DB_HOST'] ?? 'localhost';
        $this->username = getenv('DB_USERNAME') ?: $_ENV['DB_USERNAME'] ?? $_SERVER['DB_USERNAME'] ?? 'root';
        $this->password = getenv('DB_PASSWORD') ?: $_ENV['DB_PASSWORD'] ?? $_SERVER['DB_PASSWORD'] ?? '';
        $this->database = getenv('DB_NAME') ?: $_ENV['DB_NAME'] ?? $_SERVER['DB_NAME'] ?? 'minilibrary';

        try {
            $this->conn = new mysqli($this->server, $this->username, $this->password, $this->database);
            if ($this->conn->connect_error) {
                error_log('DBConnection failed: ' . $this->conn->connect_error);
                $this->conn = null;
            }
        } catch (Exception $ex) {
            error_log('DBConnection exception: ' . $ex->getMessage());
            $this->conn = null;
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }
}
