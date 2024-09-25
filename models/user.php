<?php
// User.php
require_once '../config/database.php';

class User {
    public static function findByEmail($email) {
        global $pdo;
        $stmt = $pdo->prepare('SELECT * FROM users WHERE email = ?');
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($email, $password) {
        global $pdo;
        $stmt = $pdo->prepare('INSERT INTO users (email, password) VALUES (?, ?)');
        $stmt->execute([$email, $password]);
    }
}
?>
