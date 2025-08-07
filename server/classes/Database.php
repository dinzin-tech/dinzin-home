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
        // $config = require 'config.php';
        $path = $path = $_SERVER['DOCUMENT_ROOT'];
        // print_r($path);
        $config = EnvParser::parse($path."/.env");
        
        try {
            $this->pdo = new PDO(
                "mysql:host={$config['DB_HOST']};dbname={$config['DB_DATABASE']}",
                $config['DB_USERNAME'],
                $config['DB_PASSWORD']
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