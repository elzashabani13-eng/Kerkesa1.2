<?php
require_once __DIR__ . "/../config/database.php";

class News {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
    }

    public function getAll() {
        try {
            $query = "SELECT * FROM news ORDER BY created_at DESC";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }
    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM news WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM news WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function update($id, $title, $content, $image) {
        $stmt = $this->db->prepare("UPDATE news SET title = ?, content = ?, image = ? WHERE id = ?");
        return $stmt->execute([$title, $content, $image, $id]);
    }
}