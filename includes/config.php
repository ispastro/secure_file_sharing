<?php
// Define the database credentials
define('DB_HOST', 'localhost');
define('DB_NAME', 'secure_file_sharing');
define('DB_USER', 'root');
define('DB_PASS', ''); // Change this if you set a MySQL root password

try {
    // Corrected DSN
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8";

    // PDO options for best practices
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Enables error handling
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Fetch data as an associative array
        PDO::ATTR_EMULATE_PREPARES => false, // Uses real prepared statements
    ];

    // Create PDO instance
    $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
} catch (PDOException $e) {
    die("Database connection Failed: " . $e->getMessage());
}
?>
