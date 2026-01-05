<?php
class BaseModel 
{
    protected static $table = '';
    
    protected static function db() 
    {
        return Database::getConnection();
    }
    
    public static function create($data) 
    {
        $columns = implode(',', array_keys($data));
        $placeholders = implode(',', array_fill(0, count($data), '?'));
        $sql = "INSERT INTO " . static::$table . " ($columns) VALUES ($placeholders)";
        $stmt = self::db()->prepare($sql);
        $stmt->execute(array_values($data));
        return self::db()->lastInsertId();
    }
    
    public static function find($id) 
    {
        $sql = "SELECT * FROM " . static::$table . " WHERE id = ?";
        $stmt = self::db()->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
    
    public static function all() 
    {
        $sql = "SELECT * FROM " . static::$table;
        $stmt = self::db()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    public static function delete($id) 
    {
        $sql = "DELETE FROM " . static::$table . " WHERE id = ?";
        $stmt = self::db()->prepare($sql);
        return $stmt->execute([$id]);
    }
}
?>