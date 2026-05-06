<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once "classes/News.php";

$newsObj = new News();
$newsList = $newsObj->getAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElectroStore | Latest News</title>
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        .news-section {
            padding: 100px 7%;
            background-color: #0b0c10;
            min-height: 100vh;
        }
        .news-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }
        .news-card {
            background: #1f2833;
            border-radius: 15px;
            overflow: hidden;
            transition: 0.3s;
            border: 1px solid #45a29e;
        }
        .news-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(102, 252, 241, 0.2);
        }
        .news-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .news-content {
            padding: 20px;
            color: white;
        }
        .news-date {
            color: #66fcf1;
            font-size: 0.8rem;
            display: block;
            margin-bottom: 10px;
        }
        .news-title {
            font-size: 1.4rem;
            margin-bottom: 10px;
            color: #66fcf1;
        }
        .news-text {
            color: #c5c6c7;
            line-height: 1.6;
            margin-bottom: 20px;
        }
        .read-more-btn {
            color: #1f2833;
            background: #66fcf1;
            padding: 8px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            display: inline-block;
        }
    </style>
</head>
<body class="dark-theme">

    <nav class="navbar">
        <div class="logo"><i class="fas fa-bolt"></i> ELECTRO <span>STORE</span></div>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="products.php">Products</a></li>
            <li><a href="news.php" class="active">News</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </nav>

    <section class="news-section">
        <h1 style="color: white; border-left: 5px solid #66fcf1; padding-left: 15px;">Latest News</h1>
        
        <div class="news-grid">
            <?php if(!empty($newsList)): ?>
                <?php foreach($newsList as $n): ?>
                    <div class="news-card">
                        <img src="uploads/<?= htmlspecialchars($n['image']) ?>" 
                             alt="<?= htmlspecialchars($n['title']) ?>" 
                             class="news-image"
                             onerror="this.src='https://via.placeholder.com/400x200?text=No+Image+Found'">
                        
                        <div class="news-content">
                            <span class="news-date">
                                <i class="far fa-calendar-alt"></i> 
                                <?= date('d M, Y', strtotime($n['created_at'])) ?>
                            </span>
                            <h3 class="news-title"><?= htmlspecialchars($n['title']) ?></h3>
                            <p class="news-text">
                                <?= substr(htmlspecialchars($n['content']), 0, 120) ?>...
                            </p>
                            <a href="news-details.php?id=<?= $n['id'] ?>" class="read-more-btn">Read More</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div style="color: white; text-align: center; width: 100%; padding: 50px;">
                    <i class="fas fa-newspaper fa-3x" style="color: #45a29e; margin-bottom: 20px;"></i>
                    <p>Nuk ka lajme të postuara për momentin.</p>
                </div>
            <?php endif; ?>
        </div>
    </section>

</body>
</html>