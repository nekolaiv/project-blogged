<?php
// User.php
require_once '../config/database.php';

class User {
    protected $db;

    function __construct(){
        $this->db = new Database();
    }

    public static function findByEmail($email) {
        $sql = "SELECT * FROM users WHERE email = :email";
        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':email', $email);
        $data=null;
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

    public static function create($email, $password) {
        $sql = "INSERT INTO users(email, password) VALUES (:email, :password)";
        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':email', $email);
        $query->bindParam(':password', $password);
        if($query->execute()){
            return true;
        } else {
            return false;
        }
    }
}
?>
