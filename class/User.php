<?php

class User {
    private $db;

    public function __construct() {
        include 'koneksi.php';  
    }

    public function register($username, $email) {
        $query = "INSERT INTO users (username, email) VALUES (:username, :email)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":email", $email);
        return $stmt->execute();
    }

    public function login($username, $email) {
        $query = "SELECT * FROM users WHERE username = :username AND email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            session_start();
            $_SESSION['username'] = $result['username'];
            header("Location: AllTask.php");
            exit();
        } else {
            return "Username atau email salah.";
        }
    }
}
