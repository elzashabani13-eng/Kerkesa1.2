<?php
require_once __DIR__ . "/../config/database.php";

class Order {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
    }

    public function placeOrder($user_id, $address, $phone, $total_amount) {
        try {
            $sql = "INSERT INTO orders (user_id, address, phone, total_amount) VALUES (?, ?, ?, ?)";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([$user_id, $address, $phone, $total_amount]);
        } catch (PDOException $e) {
            return false;
        }
    }
}