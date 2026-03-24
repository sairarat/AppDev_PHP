<?php

// Database Configuration
$host     = 'localhost';
$port     = 3306;
$dbName   = 'PetDB';   
$username = 'root';    
$password = '123';

// Connection String
$dsn = "mysql:host={$host};port={$port};dbname={$dbName};charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Database connection failed: " . $e->getMessage();
}