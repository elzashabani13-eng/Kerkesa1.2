<?php
require_once __DIR__ . "/../config/database.php";

class Product {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
    }

    public function getAll() {
        if (!$this->db) {
            return [];
        }
        $query = "SELECT * FROM products ORDER BY id DESC";
        return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM products WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function add($title, $price, $image, $desc, $user_id) {
        $stmt = $this->db->prepare("
            INSERT INTO products (title, price, image, description, created_by)
            VALUES (?, ?, ?, ?, ?)
        ");
        return $stmt->execute([$title, $price, $image, $desc, $user_id]);
    }

    public function update($id, $title, $price, $image, $desc) {
        $stmt = $this->db->prepare("
            UPDATE products 
            SET title=?, price=?, image=?, description=? 
            WHERE id=?
        ");
        return $stmt->execute([$title, $price, $image, $desc, $id]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM products WHERE id=?");
        return $stmt->execute([$id]);
    }
}

