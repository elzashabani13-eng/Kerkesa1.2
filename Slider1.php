<?php
require_once __DIR__ . "/../config/database.php";

class Slider {
    private $conn;

    public function __construct() {
        try {
            $db = new Database();
            $this->conn = $db->connect();
        } catch (Exception $e) {
            $this->conn = null;
        }
    }

    public function getAll() {
        try {
            if (!$this->conn) return [];
            $sql = "SELECT * FROM slider ORDER BY id DESC";
            $stmt = $this->conn->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }

    public function add($image, $title, $description = "") {
        try {
            if (!$this->conn) return false;
            $sql = "INSERT INTO slider (image, title, description) VALUES (?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute([
                $image, 
                htmlspecialchars(strip_tags($title)), 
                htmlspecialchars(strip_tags($description))
            ]);
        } catch (PDOException $e) {
            return false;
        }
    }

    public function delete($id) {
        try {
            if (!$this->conn) return false;
            $sql = "DELETE FROM slider WHERE id=?";
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute([$id]);
        } catch (PDOException $e) {
            return false;
        }
    }
}
