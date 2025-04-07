<?php
// config.php

// Automatically detect the base URL
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'];
$base_url = $protocol . '://' . $host . '/ums168/';

define('BASE_URL', $base_url);

// Database configuration constants
define('DB_HOST', 'localhost');
define('DB_NAME', 'ums168_db');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

// Create a database connection using PDO
try {
    $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully"; 
} catch (PDOException $e) {
    header('Location:'.BASE_URL.'views/error/maintenance.php');
    // echo "Connection failed: " . $e->getMessage();
}
