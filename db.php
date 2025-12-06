<?php
// Load .env if present
require_once __DIR__ . '/env.php';

// Prefer environment variables if available, fallback to XAMPP defaults
$host = getenv('DB_HOST') ?: 'localhost';
$user = getenv('DB_USER') ?: 'root';
$pass = getenv('DB_PASS') !== false ? getenv('DB_PASS') : '';
$dbname = getenv('DB_NAME') ?: 'scott_blog';

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $conn = mysqli_connect($host, $user, $pass, $dbname);
} catch (mysqli_sql_exception $e) {
    // If connecting to 'localhost' fails, retry with '127.0.0.1' (avoids socket/host resolution issues)
    if ($host === 'localhost') {
        try {
            $conn = mysqli_connect('127.0.0.1', $user, $pass, $dbname);
        } catch (mysqli_sql_exception $e2) {
            http_response_code(500);
            die('Database connection error: ' . $e2->getMessage());
        }
    } else {
        http_response_code(500);
        die('Database connection error: ' . $e->getMessage());
    }
}

// Set charset for proper encoding
mysqli_set_charset($conn, 'utf8mb4');
?>