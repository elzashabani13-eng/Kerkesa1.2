<?php
require_once __DIR__ . "/../config/database.php";

class Settings {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
    }

    // Merr përmbajtjen për një seksion të caktuar
    public function getContent($section) {
        $sql = "SELECT content FROM site_settings WHERE section_name = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$section]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['content'] : "";
    }

    // Ndryshon përmbajtjen nga Admin Panel
    public function updateContent($section, $new_content) {
        $sql = "UPDATE site_settings SET content = ? WHERE section_name = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$new_content, $section]);
    }
}