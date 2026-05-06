<?php
require_once __DIR__ . "/../config/database.php";

class Contact {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
    }

    public function saveMessage($name, $email, $message) {
        try {
            if (!$this->db) return false;

            $sql = "INSERT INTO messages (name, email, message) VALUES (?, ?, ?)";
            $stmt = $this->db->prepare($sql);
            
            return $stmt->execute([
                htmlspecialchars(strip_tags($name)),
                htmlspecialchars(strip_tags($email)),
                htmlspecialchars(strip_tags($message))
            ]);
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getMessages() {
        try {
            if (!$this->db) return [];
            
            $sql = "SELECT * FROM messages ORDER BY id DESC";
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }

    public function deleteMessage($id) {
        try {
            if (!$this->db) return false;

            $sql = "DELETE FROM messages WHERE id=?";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([$id]);
        } catch (PDOException $e) {
            return false;
        }
    }
}