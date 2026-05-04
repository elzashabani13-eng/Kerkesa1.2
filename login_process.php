<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require_once "config/database.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $database = new Database();
    $db = $database->connect();

    if ($db) {
        try {
            $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->execute([$email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && $password === $user['password']) {
                $_SESSION['user'] = [
                    'id'       => $user['id'],
                    'username' => $user['username'],
                    'role'     => $user['role']
                ];

                if ($user['role'] === 'admin') {
                    header("Location: admin/products.php");
                } else {
                    header("Location: index.php");
                }
                exit;
            } else {
                echo "<script>alert('Email ose Password i gabuar!'); window.location='login.php';</script>";
            }
        } catch (PDOException $e) {
            die("❌ Gabim në SQL: " . $e->getMessage());
        }
    } else {
        die("❌ Lidhja me databazën dështoi!");
    }
} else {
    header("Location: login.php");
    exit;
}
?>