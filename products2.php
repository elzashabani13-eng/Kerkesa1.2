<?php
session_start();
require_once "../classes/Product.php";

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header("Location: ../login.php");
    exit;
}

$productObj = new Product();

if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $productObj->delete($_GET['id']);
    header("Location: products.php");
    exit;
}

$products = $productObj->getAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin | Manage Products</title>
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { background: #0b0c10; color: white; padding: 20px; font-family: Arial, sans-serif; }
        .container { max-width: 1200px; margin: auto; }
        
        .admin-nav { 
            background: #1f2833; 
            padding: 15px 25px; 
            border-radius: 8px; 
            margin-bottom: 20px; 
            display: flex; 
            justify-content: space-between; 
            align-items: center;
            border-bottom: 2px solid #66fcf1;
        }
        .admin-nav a { color: #66fcf1; text-decoration: none; font-weight: bold; margin-right: 20px; }
        .admin-nav .logout-btn { color: #ff4d4d; }

        table { width: 100%; border-collapse: collapse; background: #1f2833; margin-top: 20px; border-radius: 10px; overflow: hidden; }
        th, td { padding: 15px; border: 1px solid #45a29e; text-align: left; }
        th { background: #45a29e; color: #0b0c10; }
        tr:hover { background: #2b3a4a; }
        
        .btn-add { background: #66fcf1; color: #0b0c10; padding: 10px 20px; text-decoration: none; border-radius: 5px; font-weight: bold; }
        .action-links a { text-decoration: none; font-weight: bold; margin-right: 10px; }
        .edit { color: #66fcf1; }
        .delete { color: #ff4d4d; }
        img { border-radius: 5px; object-fit: cover; border: 1px solid #45a29e; }
    </style>
</head>
<body>

    <div class="container">
        <div class="admin-nav">
            <div>
                <a href="dashboard.php"><i class="fas fa-th-large"></i> Dashboard</a>
                <a href="products.php" style="color: white; border-bottom: 2px solid #66fcf1;">Products</a>
                <a href="news.php">News</a>
            </div>
            <div>
                <span style="margin-right: 15px;"><i class="fas fa-user-shield"></i> <?= htmlspecialchars($_SESSION['user']['username']) ?></span>
                <a href="../logout.php" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
        </div>

        <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 30px;">
            <h1><i class="fas fa-boxes"></i> Menaxhimi i Produkteve</h1>
            <a href="add_product.php" class="btn-add"><i class="fas fa-plus"></i> Shto Produkt të Ri</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Imazhi</th>
                    <th>Titulli</th>
                    <th>Çmimi</th>
                    <th>Veprimet</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($products)): ?>
                    <?php foreach ($products as $p): ?>
                    <tr>
                        <td><?= $p['id'] ?></td>
                        <td>
                            <img src="../uploads/<?= htmlspecialchars($p['image']) ?>" width="60" height="60" onerror="this.src='https://via.placeholder.com/60'">
                        </td>
                        <td><?= htmlspecialchars($p['title']) ?></td>
                        <td>€<?= number_format($p['price'], 2) ?></td>
                        <td class="action-links">
                            <a href="edit_product.php?id=<?= $p['id'] ?>" class="edit"><i class="fas fa-edit"></i> Edit</a>
                            <a href="products.php?action=delete&id=<?= $p['id'] ?>" class="delete" onclick="return confirm('A jeni të sigurt?')"><i class="fas fa-trash"></i> Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="5" style="text-align:center;">Nuk ka produkte në databazë.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</body>
</html>
