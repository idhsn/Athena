<?php
require_once '../core/Auth.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    
    if (Auth::login($email, $password)) {
        // Login successful - redirect to dashboard
        header('Location: dashboard.php');
        exit;
    } else {
        // Login failed - back to login form with error
        header('Location: ../views/auth/login.php?error=1');
        exit;
    }
} else {
    // If not POST, redirect to login form
    header('Location: ../views/auth/login.php');
    exit;
}
?>