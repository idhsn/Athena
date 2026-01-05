<?php 
require_once '../core/BaseModel.php';

class User extends BaseModel {
    protected static $table = 'users';

    public static function findByEmail($email) {
        $sql = "SELECT * FROM " . static::$table . " WHERE email = ?";
        $stmt = self::db()->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->fetch();
    }

    public static function register($email, $password, $fullName, $role = 'team_member') {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        return self::create([
            'email' => $email,
            'password' => $hashedPassword,
            'full_name' => $fullName,
            'role' => $role
        ]);
    }

    public static function verifyPassword($inputPassword, $hashedPassword) {
        return password_verify($inputPassword, $hashedPassword);
    }
}
?>