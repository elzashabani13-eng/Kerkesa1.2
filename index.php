<?php
require_once "classes/Product.php";
require_once "classes/News.php";
require_once "classes/Slider.php";

$productObj = new Product();
$newsObj = new News();
$sliderObj = new Slider();

$products = $productObj->getAll();
$newsList = $newsObj->getAll();
$slides = $sliderObj->getAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElectroStore | Home</title>
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="dark-theme">

    <nav class="navbar">
        <div class="logo"><i class="fas fa-bolt"></i> ELECTRO <span>STORE</span></div>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="products.php">Products</a></li>
            <li><a href="news.php">News</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
        <div class="nav-auth">
            <a href="login.php" class="btn-login">Login</a>
            <a href="register.php" class="btn-register">Register</a>
            <a href="#" class="cart-icon"><i class="fas fa-shopping-cart"></i> (0)</a>
        </div>
    </nav>

    <header class="hero">
        <div class="hero-content">
            <span class="subtitle">PREMIUM HOME APPLIANCES</span>
            <h1>Upgrade Your Living with <span>Smart Technology</span></h1>
            <p>Explore our exclusive collection of next-generation electrical solutions.</p>
            <div class="hero-btns">
                <a href="products.php" class="btn-shop">Shop Collection</a>
                <a href="about.php" class="btn-learn">Learn More</a>
            </div>
        </div>
    </header>

    <section class="products-section">
        <div class="section-title"><h2>Our Products</h2></div>
        <div class="product-grid">
            <?php if(!empty($products)): ?>
                <?php foreach($products as $p): ?>
                    <div class="product-card">
                        <div class="product-img">
                            <img src="uploads/<?= $p['image'] ?>" alt="<?= $p['title'] ?>">
                        </div>
                        <div class="product-info">
                            <h3><?= $p['title'] ?></h3>
                            <p class="price">$<?= $p['price'] ?></p>
                            <button class="add-to-cart">Add to Cart</button>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No products found.</p>
            <?php endif; ?>
        </div>
    </section>

    <script src="assets/script.js"></script>
</body>
</html>
