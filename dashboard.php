<?php
session_start();
require_once "../config/database.php";

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header("Location: ../login.php");
    exit;
}

$db = new Database();
$conn = $db->connect();

$users = $conn->query("SELECT COUNT(*) FROM users")->fetchColumn();
$products = $conn->query("SELECT COUNT(*) FROM products")->fetchColumn();
$news = $conn->query("SELECT COUNT(*) FROM news")->fetchColumn();
$messages = $conn->query("SELECT COUNT(*) FROM messages")->fetchColumn();
?>

<h1>Admin Dashboard</h1>

<div style="display:flex; gap:20px; flex-wrap:wrap;">
    <div>Users: <?= $users ?></div>
    <div>Products: <?= $products ?></div>
    <div>News: <?= $news ?></div>
    <div>Messages: <?= $messages ?></div>
</div>

<br>
<a href="products.php">Manage Products</a> |
<a href="news.php">Manage News</a> |
<a href="messages.php">Messages</a> |
<a href="slider.php">Slider</a>