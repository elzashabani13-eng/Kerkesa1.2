<?php
session_start(); 
require_once "classes/Product.php";
require_once "classes/News.php";
require_once "classes/Slider.php";
require_once "classes/Settings.php"; 

$productObj = new Product();
$newsObj = new News();
$sliderObj = new Slider();
$settingsObj = new Settings(); 

$products = $productObj->getAll();
$newsList = $newsObj->getAll();
$slides = $sliderObj->getAll();

$heroTitle = $settingsObj->getContent('hero_title');
$heroSubtitle = $settingsObj->getContent('hero_subtitle');
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
<body>

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
            <?php if(isset($_SESSION['user'])): ?>
                <span style="color: #00d2ff; margin-right: 15px; font-weight: bold;">
                    <i class="fas fa-user"></i> <?= htmlspecialchars($_SESSION['user']['username']) ?>
                </span>
                <a href="logout.php" class="btn-login" style="color: #ff4d4d;">Logout</a>
            <?php else: ?>
                <a href="login.php" class="btn-login">Login</a>
                <a href="register.php" class="btn-register">Register</a>
            <?php endif; ?>
            <a href="#" class="cart-icon"><i class="fas fa-shopping-cart"></i> (0)</a>
        </div>
    </nav>

    <header class="hero-slider">
        <?php if(!empty($slides)): ?>
            <div class="slider-container">
                <?php foreach($slides as $index => $slide): ?>
                    <div class="slide <?= $index === 0 ? 'active' : '' ?>" 
                         style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('uploads/<?= $slide['image'] ?>');">
                        <div class="hero-content">
                            <span class="subtitle">PREMIUM SELECTION</span>
                            <h1><?= htmlspecialchars($slide['title']) ?></h1>
                            <p><?= isset($slide['description']) ? htmlspecialchars($slide['description']) : '' ?></p>
                            <div class="hero-btns">
                                <a href="products.php" class="btn-shop">Shop Collection</a>
                                <a href="about.php" class="btn-learn">Learn More</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <button class="prev-slide"><i class="fas fa-chevron-left"></i></button>
            <button class="next-slide"><i class="fas fa-chevron-right"></i></button>
        <?php else: ?>
            <div class="slide active" style="background: #12161f; display: flex; align-items: center; justify-content: center;">
                <div class="hero-content" style="text-align: center;">
                    <h1><?= htmlspecialchars($heroTitle) ?></h1>
                    <p><?= htmlspecialchars($heroSubtitle) ?></p>
                </div>
            </div>
        <?php endif; ?>
    </header>

    <section class="products-section">
        <div class="section-title"><h2>Our Products</h2></div>
        <div class="product-grid">
            <?php if(!empty($products)): ?>
                <?php foreach($products as $p): ?>
                    <div class="product-card">
                        <img src="uploads/<?= htmlspecialchars($p['image']) ?>" alt="<?= htmlspecialchars($p['title']) ?>">
                        <div class="product-info">
                            <h3><?= htmlspecialchars($p['title']) ?></h3>
                            <p class="price">€<?= number_format($p['price'], 2) ?></p>
                            <button class="add-to-cart">Add to Cart</button>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </section>

    <script src="assets/script.js"></script>
</body>
</html>
