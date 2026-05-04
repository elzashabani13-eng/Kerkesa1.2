<?php
require_once "config/database.php";

class Auth {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function register($name, $email, $password) {

        $check = $this->conn->prepare("SELECT id FROM users WHERE email = ?");
        $check->execute([$email]);

        if ($check->rowCount() > 0) {
            return false;
        }

        $hashed = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (name, email, password, role)
                VALUES (?, ?, ?, 'user')";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([$name, $email, $hashed]);
    }

    public function login($email, $password) {

        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$email]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {

            session_start();
            $_SESSION['user'] = $user;

            return true;
        }

        return false;
    }

    public function check() {
        return isset($_SESSION['user']);
    }
}