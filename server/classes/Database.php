<?php
namespace classes;

// require_once '../autoload.php';

use PDO;
use PDOException;
use classes\EnvParser;

class Database
{
    private $pdo;
    
    public function __construct() {
        // Resolve .env path: check project directory first, then DOCUMENT_ROOT
        $envPath = __DIR__ . '/../../.env';
        if (!file_exists($envPath) && !empty($_SERVER['DOCUMENT_ROOT'])) {
            $envPath = rtrim($_SERVER['DOCUMENT_ROOT'], '/') . '/.env';
        }

        $config = EnvParser::parse($envPath);

        $host     = !empty($config['DB_HOST']) ? $config['DB_HOST'] : '127.0.0.1';
        $dbname   = !empty($config['DB_DATABASE']) ? $config['DB_DATABASE'] : 'dinzinin_main';
        $username = isset($config['DB_USERNAME']) ? $config['DB_USERNAME'] : 'root';
        $password = isset($config['DB_PASSWORD']) ? $config['DB_PASSWORD'] : '';

        try {
            $this->pdo = new PDO(
                "mysql:host={$host};dbname={$dbname};charset=utf8mb4",
                $username,
                $password
            );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error connecting to DB: " . $e->getMessage());
        }
    }
    
    public function getConnection() {
        return $this->pdo;
    }
}