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

$activities = $conn->query("SELECT * FROM activity_log ORDER BY created_at DESC LIMIT 10")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard | ElectroStore</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { font-family: Arial, sans-serif; background-color: #0b0c10; color: white; padding: 20px; }
        .stats-container { display: flex; gap: 20px; flex-wrap: wrap; margin-bottom: 30px; }
        .stat-box { background: #1f2833; padding: 20px; border-radius: 8px; min-width: 150px; text-align: center; border-bottom: 3px solid #66fcf1; }
        .stat-box h2 { margin: 0; color: #66fcf1; }
        
        .nav-menu { background: #1f2833; padding: 15px; border-radius: 8px; margin-bottom: 20px; }
        .nav-menu a { color: #66fcf1; text-decoration: none; margin-right: 15px; font-weight: bold; }
        .nav-menu a:hover { text-decoration: underline; }

        .log-table { width: 100%; border-collapse: collapse; background: #1f2833; border-radius: 8px; overflow: hidden; }
        .log-table th, .log-table td { padding: 12px; text-align: left; border-bottom: 1px solid #45a29e; }
        .log-table th { background-color: #45a29e; color: #0b0c10; }
        .log-table tr:hover { background: #2c3531; }
        .status-tag { background: #66fcf1; color: black; padding: 2px 8px; border-radius: 4px; font-size: 0.8rem; font-weight: bold; }
    </style>
</head>
<body>

    <h1><i class="fas fa-tachometer-alt"></i> Admin Dashboard</h1>

    <div class="nav-menu">
        <a href="products.php"><i class="fas fa-box"></i> Manage Products</a>
        <a href="news.php"><i class="fas fa-newspaper"></i> Manage News</a>
        <a href="messages.php"><i class="fas fa-envelope"></i> Messages</a>
        <a href="slider.php"><i class="fas fa-images"></i> Slider</a>
        <a href="../index.php" style="color: #ff4d4d;"><i class="fas fa-external-link-alt"></i> View Site</a>
    </div>

    <div class="stats-container">
        <div class="stat-box">
            <p>Users</p>
            <h2><?= $users ?></h2>
        </div>
        <div class="stat-box">
            <p>Products</p>
            <h2><?= $products ?></h2>
        </div>
        <div class="stat-box">
            <p>News</p>
            <h2><?= $news ?></h2>
        </div>
        <div class="stat-box">
            <p>Messages</p>
            <h2><?= $messages ?></h2>
        </div>
    </div>

    <br>
    <h2><i class="fas fa-history"></i> Recent Activity Log</h2>
    <table class="log-table">
        <thead>
            <tr>
                <th>User</th>
                <th>Action</th>
                <th>Time</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($activities)): ?>
                <?php foreach($activities as $log): ?>
                <tr>
                    <td><i class="fas fa-user-circle"></i> <?= htmlspecialchars($log['username']) ?></td>
                    <td><span class="status-tag"><?= htmlspecialchars($log['action']) ?></span></td>
                    <td><?= date('d M, H:i', strtotime($log['created_at'])) ?></td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3" style="text-align:center;">No activity recorded yet.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>
