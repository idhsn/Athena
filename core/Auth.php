<?php
// core/Auth.php
require_once 'Session.php';
require_once '../entities/User.php';

class Auth {
    public static function login($email, $password) {
        // 1. Find user by email
        $user = User::findByEmail($email);
        
        if (!$user) {
            return false; // User not found
        }
        
        // 2. Verify password
        if (!User::verifyPassword($password, $user['password'])) {
            return false; // Wrong password
        }
        
        // 3. Start session, store user data
        Session::set('user_id', $user['id']);
        Session::set('user_email', $user['email']);
        Session::set('user_role', $user['role']);
        Session::set('user_name', $user['full_name']);
        
        return true;
    }
    
    public static function logout() {
        Session::destroy();
    }
    
    public static function isLoggedIn() {
        return Session::get('user_id') !== null;
    }
    
    public static function getUser() {
        if (self::isLoggedIn()) {
            return [
                'id' => Session::get('user_id'),
                'email' => Session::get('user_email'),
                'role' => Session::get('user_role'),
                'name' => Session::get('user_name')
            ];
        }
        return null;
    }
    
    public static function isAdmin() {
        return Session::get('user_role') === 'admin';
    }
    
    public static function isProjectManager() {
        $role = Session::get('user_role');
        return $role === 'project_manager' || $role === 'admin';
    }
    
    public static function requireLogin() {
        if (!self::isLoggedIn()) {
            header('Location: ../views/auth/login.php');
            exit;
        }
    }
    
    public static function requireAdmin() {
        self::requireLogin();
        if (!self::isAdmin()) {
            header('Location: ../public/dashboard.php');
            exit;
        }
    }
    
    public static function requireProjectManager() {
        self::requireLogin();
        if (!self::isProjectManager()) {
            header('Location: ../public/dashboard.php');
            exit;
        }
    }
}
?>