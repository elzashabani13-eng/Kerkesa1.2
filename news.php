<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$class_path = "../classes/News.php";

if (!file_exists($class_path)) {
    die("GABIM: Skedari News.php nuk u gjet ne: " . realpath("../") . "/classes/News.php");
}

require_once $class_path;

try {
    $newsObj = new News();
    $newsList = $newsObj->getAll();
} catch (Exception $e) {
    die("GABIM NE DATABASE: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin | News</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body style="background: #0b0c10; color: white; padding: 50px;">
    <h2>Admin News Panel</h2>
    <table border="1" style="width:100%; border-collapse: collapse;">
        <tr>
            <th>ID</th>
            <th>Titulli</th>
            <th>Veprime</th>
        </tr>
        <?php foreach($newsList as $n): ?>
        <tr>
            <td><?= $n['id'] ?></td>
            <td><?= htmlspecialchars($n['title']) ?></td>
            <td>
                <a href="edit_news.php?id=<?= $n['id'] ?>" style="color: cyan;">Edit</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>