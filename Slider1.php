<?php
require_once "config/database.php";

class Slider {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function getAll() {
        $sql = "SELECT * FROM slider ORDER BY id DESC";
        return $this->conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add($image, $title) {
        $sql = "INSERT INTO slider (image, title) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$image, $title]);
    }

    public function delete($id) {
        $sql = "DELETE FROM slider WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id]);
    }
}