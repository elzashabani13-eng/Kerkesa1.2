<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header("Location: ../login.php");
    exit;
}

require_once "../classes/Product.php";

$message = "";
$messageType = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $user_id = $_SESSION['user']['id'];

    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $target_folder = "../uploads/" . $image_name;

    if (!is_dir('../uploads/')) {
        mkdir('../uploads/', 0777, true);
    }

    if (move_uploaded_file($image_tmp, $target_folder)) {
        $productObj = new Product();
        $result = $productObj->add($title, $price, $image_name, $description, $user_id);
        
        if ($result) {
            header("Location: products.php?success=1");
            exit;
        } else {
            $message = "❌ Gabim: Nuk u ruajt në databazë. Kontrollo kolonat!";
            $messageType = "error";
        }
    } else {
        $message = "❌ Gabim: Imazhi nuk u ngarkua në folderin 'uploads'.";
        $messageType = "error";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shto Produkt - ElectroStore</title>
    <link rel="stylesheet" href="../assets/style.css">
    <style>
        body { background-color: #0b0c10; color: white; font-family: 'Arial', sans-serif; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        .container { background-color: #1f2833; padding: 30px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.5); width: 100%; max-width: 500px; border: 1px solid #45a29e; }
        h2 { color: #66fcf1; text-align: center; margin-bottom: 25px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; color: #c5c6c7; }
        input, textarea { width: 100%; padding: 10px; border: 1px solid #45a29e; background: #0b0c10; color: white; border-radius: 5px; box-sizing: border-box; }
        button { width: 100%; padding: 12px; background-color: #66fcf1; border: none; color: #0b0c10; font-weight: bold; cursor: pointer; border-radius: 5px; transition: 0.3s; margin-top: 10px; }
        button:hover { background-color: #45a29e; }
        .msg { padding: 10px; margin-bottom: 15px; border-radius: 5px; text-align: center; font-size: 14px; }
        .error { background-color: #ff4d4d; color: white; }
        .back-link { display: block; text-align: center; margin-top: 15px; color: #c5c6c7; text-decoration: none; }
    </style>
</head>
<body>

<div class="container">
    <h2>Shto Produkt të Ri</h2>

    <?php if ($message): ?>
        <div class="msg <?php echo $messageType; ?>"><?php echo $message; ?></div>
    <?php endif; ?>

    <form action="add_product.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>Emri i Produktit</label>
            <input type="text" name="title" required>
        </div>

        <div class="form-group">
            <label>Çmimi (€)</label>
            <input type="number" step="0.01" name="price" required>
        </div>

        <div class="form-group">
            <label>Imazhi</label>
            <input type="file" name="image" accept="image/*" required>
        </div>

        <div class="form-group">
            <label>Përshkrimi</label>
            <textarea name="description" rows="4"></textarea>
        </div>

        <button type="submit">Ruaj Produktin</button>
        <a href="products.php" class="back-link">← Kthehu te produktet</a>
    </form>
</div>

</body>
</html>
