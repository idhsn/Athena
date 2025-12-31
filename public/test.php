<?php
require_once __DIR__ . '/../core/Database.php';

try {
    $pdo = Database::getConnection();
    echo "✅ Database connection successful!<br>";
    
    $stmt = $pdo->query("SELECT COUNT(*) as count FROM users");
    $result = $stmt->fetch();
    echo "Total users in database: " . $result['count'] . "<br>";
    
    $tables = $pdo->query("SHOW TABLES")->fetchAll();
    echo "Tables found: " . count($tables) . "<br> <br>";
    foreach ($tables as $table) {
        print_r($table) ;
        echo "<br>";
    }
    
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage();
}