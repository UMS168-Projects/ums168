<?php
// Database connection using mysqli
$conn = mysqli_connect('localhost', 'root', '', 'ums168_db');

// Check if the connection is successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}























// Database configuration constants
// define('DB_HOST', 'localhost');
// define('DB_NAME', 'ums168_db');
// define('DB_USER', 'root');
// define('DB_PASSWORD', '');

// // Create a database connection using PDO
// try {
//     $conn = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
//     // Set the PDO error mode to exception
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     // echo "Connected successfully"; 
// } catch (PDOException $e) {
//     header('Location:'.BASE_URL.'views/error/maintenance.php');
//     // echo "Connection failed: " . $e->getMessage();
// }
// Database configuration constants
// define('DB_HOST', 'localhost');
// define('DB_NAME', 'ums168_db');
// define('DB_USER', 'root');
// define('DB_PASSWORD', '');

// // Create a PDO connection
// try {
//     $conn = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
//     // Set the PDO error mode to exception
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     // echo "Connected successfully"; 
// } catch (PDOException $e) {
//     header('Location:' . BASE_URL . 'views/error/maintenance.php');
//     // echo "Connection failed: " . $e->getMessage();
// }