<?php
require_once '../core/Database.php';
require_once '../core/BaseModel.php';
require_once '../entities/User.php';

echo "1. Find admin: ";
$admin = User::findByEmail('admin@athena.com');
echo $admin ? "✅ Found" : "❌ Not found";

echo "<br>2. Register test user: ";
$id = User::register('test@test.com', 'mypassword', 'Test User');
echo "✅ ID: $id";

echo "<br>3. Verify password: ";
$user = User::findByEmail('test@test.com');
$isValid = User::verifyPassword('mypassword', $user['password']);
echo $isValid ? "✅ Correct" : "❌ Wrong";
?>