<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once "../classes/Product.php";

$productObj = new Product();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = $productObj->getById($id);

    if (!$data) {
        header("Location: products.php");
        exit;
    }
} else {
    header("Location: products.php");
    exit;
}

if (isset($_POST['update'])) {
    $title = $_POST['title'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $image = $data['image']; 

    if (!empty($_FILES['image']['name'])) {
        
        $old_image_path = "../uploads/" . $data['image'];
        if (file_exists($old_image_path)) {
            unlink($old_image_path);
        }

        $image = time() . "_" . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "../uploads/" . $image);
    }

    $productObj->update($id, $title, $description, $price, $image);

    header("Location: products.php");
    exit;
}
?>

<style>
    body { background: #0b0c10; color: white; font-family: Arial; padding: 50px; }
    input, textarea { width: 300px; padding: 10px; margin-bottom: 10px; background: #1f2833; border: 1px solid #45a29e; color: white; }
    button { padding: 10px 20px; background: #66fcf1; border: none; cursor: pointer; font-weight: bold; }
</style>

<h2>Edit Product</h2>
<form method="POST" enctype="multipart/form-data">
    <label>Title:</label><br>
    <input name="title" value="<?= htmlspecialchars($data['title']) ?>"><br>
    
    <label>Price:</label><br>
    <input name="price" value="<?= htmlspecialchars($data['price']) ?>"><br>
    
    <label>Description:</label><br>
    <textarea name="description" rows="5"><?= htmlspecialchars($data['description']) ?></textarea><br>
    
    <label>Current Image:</label><br>
    <img src="../uploads/<?= $data['image'] ?>" width="100"><br>
    <input type="file" name="image"><br><br>

    <button name="update">Update Product</button>
    <a href="products.php" style="color: #66fcf1; margin-left: 10px;">Cancel</a>
</form>