<?php
require_once '../entities/User.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $fullName = $_POST['full_name'] ?? '';
    $role = $_POST['role'] ?? 'team_member';
    
    // Check if email already exists
    $existingUser = User::findByEmail($email);
    
    if ($existingUser) {
        // Email already taken
        header('Location: ../views/auth/register.php?error=1');
        exit;
    }
    
    // Create new user
    $userId = User::register($email, $password, $fullName, $role);
    
    if ($userId) {
        // Registration successful
        header('Location: ../views/auth/register.php?success=1');
        exit;
    } else {
        // Registration failed
        header('Location: ../views/auth/register.php?error=1');
        exit;
    }
} else {
    // If not POST, redirect to registration form
    header('Location: ../views/auth/register.php');
    exit;
}
?>