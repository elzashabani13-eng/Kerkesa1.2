<?php
session_start();

require_once "../classes/Contact.php";

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header("Location: ../login.php");
    exit;
}

$contactObj = new Contact();

if (isset($_GET['delete'])) {
    $contactObj->deleteMessage($_GET['delete']);
    header("Location: messages.php");
    exit;
}

$messages = $contactObj->getMessages();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin | Messages</title>
    <link rel="stylesheet" href="../assets/style.css">
    <style>
        body { background: #0b0c10; color: white; padding: 40px; font-family: Arial; }
        .message-card { 
            background: #1f2833; 
            border: 1px solid #45a29e; 
            margin-bottom: 15px; 
            padding: 20px; 
            border-radius: 10px;
        }
        .message-card b { color: #66fcf1; font-size: 1.1rem; }
        .delete-link { color: #ff4d4d; text-decoration: none; font-weight: bold; float: right; }
    </style>
</head>
<body>

    <h1>Contact Messages</h1>
    <a href="dashboard.php" style="color: #66fcf1;">&larr; Back to Dashboard</a>
    <hr style="border-color: #45a29e; margin: 20px 0;">

    <?php if(!empty($messages)): ?>
        <?php foreach ($messages as $m): ?>
            <div class="message-card">
                <a href="?delete=<?= $m['id'] ?>" class="delete-link" onclick="return confirm('A je i sigurt?')">Delete</a>
                <b><?= htmlspecialchars($m['name']) ?></b> 
                <span style="color: #c5c6c7;">(<?= htmlspecialchars($m['email']) ?>)</span>
                <p style="margin-top: 10px; line-height: 1.6;"><?= nl2br(htmlspecialchars($m['message'])) ?></p>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Nuk ka asnjë mesazh të ri.</p>
    <?php endif; ?>

</body>
</html>