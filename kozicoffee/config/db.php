<?php
/**
 * KOZI Coffee Bekasi — Database connection
 * Edit the four constants below to match your MySQL / XAMPP setup.
 */

define('DB_HOST', 'localhost');
define('DB_NAME', 'kozi_db');
define('DB_USER', 'root');
define('DB_PASS', '');

try {
    $pdo = new PDO(
        'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4',
        DB_USER,
        DB_PASS,
        [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ]
    );
} catch (PDOException $e) {
    die('Database connection failed. Please import database/kozi_db.sql and check config/db.php. (' . $e->getMessage() . ')');
}
