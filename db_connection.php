<?php
$databaseFile = "your_database.db"; // Change to your desired SQLite database file path

try {
    $conn = new PDO("sqlite:" . $databaseFile);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
