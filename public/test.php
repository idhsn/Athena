<?php
require_once '../core/Database.php';
$pdo = Database::getConnection();
echo "✅ Database connected!<br>";

$stmt = $pdo->query("SELECT COUNT(*) as count FROM users");
$result = $stmt->fetch();
echo "Users in database: " . $result['count'];
?>