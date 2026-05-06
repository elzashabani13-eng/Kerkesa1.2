<?php

session_start();

require_once "classes/Product.php";

$productObj = new Product();
$products = $productObj->getAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products | ElectroStore</title>
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        body {
            background-color: #0b0c10;
            color: white;
            font-family: 'Arial', sans-serif;
        }

        .products-container {
            padding: 100px 7%;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .product-card {
            background: #1f2833;
            border: 1px solid #45a29e;
            border-radius: 15px;
            padding: 20px;
            text-align: center;
            transition: 0.3s;
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(102, 252, 241, 0.2);
        }

        .product-image {
            width: 100%;
            height: 200px;
            object-fit: contain;
            margin-bottom: 15px;
            border-radius: 10px;
        }

        .product-title {
            font-size: 1.2rem;
            color: #66fcf1;
            margin-bottom: 10px;
        }

        .product-price {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 15px;
            display: block;
        }

        .add-cart-btn {
            background-color: #66fcf1;
            color: #0b0c10;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
            transition: 0.3s;
        }

        .add-cart-btn:hover {
            background-color: #45a29e;
        }

        .cart-icon-nav {
            position: relative;
        }

        .cart-count {
            position: absolute;
            top: -10px;
            right: -15px;
            background: #66fcf1;
            color: #0b0c10;
            border-radius: 50%;
            padding: 2px 6px;
            font-size: 0.7rem;
            font-weight: bold;
        }
    </style>
</head>
<body>

   
    <nav class="navbar">
        <div class="logo"><i class="fas fa-bolt"></i> ELECTRO <span>STORE</span></div>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="products.php" class="active">Products</a></li>
            <li><a href="news.php">News</a></li>
            <li><a href="cart.php" class="cart-icon-nav">
                <i class="fas fa-shopping-cart"></i> 
                <?php if(isset($_SESSION['cart'])): ?>
                    <span class="cart-count"><?= count($_SESSION['cart']) ?></span>
                <?php endif; ?>
            </a></li>
        </ul>
    </nav>

    <div class="products-container">
        <h1 style="border-left: 5px solid #66fcf1; padding-left: 15px;">Our Technology</h1>
        
        <div class="product-grid">
            <?php if(!empty($products)): ?>
                <?php foreach($products as $product): ?>
                    <div class="product-card">
                       
                        <img src="uploads/<?= htmlspecialchars($product['image']) ?>" 
                             alt="<?= htmlspecialchars($product['title']) ?>" 
                             class="product-image"
                             onerror="this.src='https://via.placeholder.com/200?text=No+Image'">
                        
                        <h3 class="product-title"><?= htmlspecialchars($product['title']) ?></h3>
                        <span class="product-price">€<?= number_format($product['price'], 2) ?></span>
                        
                        <!-- Linku per shtim ne shporte -->
                        <a href="add_to_cart.php?id=<?= $product['id'] ?>" class="add-cart-btn">
                            <i class="fas fa-cart-plus"></i> Add to Cart
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Nuk u gjet asnjë produkt.</p>
            <?php endif; ?>
        </div>
    </div>

</body>
</html>