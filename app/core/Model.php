<?php
namespace App\Core;
use PDO;
use PDOException;
use PDOStatement;

class Model
{
    protected PDO $db;

    public function __construct()
    {
        $this->connect();
    }

    private function connect() : void {
        try {
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
            $this->db = new PDO($dsn, DB_USER, DB_PASSWORD);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    public function query(string $sql, array $params = []) : PDOStatement {
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute($params);
            return $stmt;
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }
    
    public function fetch(string $sql,array $params = []) : mixed {
        return $this->query($sql, $params)->fetch();
    }

    public function fetchAll(string $sql, array $params = []) : array {
        return $this->query($sql, $params)->fetchAll();
    }
    
    /**
     * @return int trả về số dòng bị ảnh hưởng
     *  */ 
    public function execute(string $sql, $params = []) : int {
        return $this->query($sql, $params)->rowCount();
    }
}