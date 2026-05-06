<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | ElectroStore</title>
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-color: #0b0c10; 
            color: white;
        }

        .about-section {
            padding: 100px 10%;
            min-height: 60vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .about-section h1 {
            color: white;
            font-size: 2.5rem;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .about-section p {
            color: #c5c6c7;
            font-size: 1.1rem;
            line-height: 1.8;
            max-width: 800px;
        }

        .title-underline {
            width: 50px;
            height: 4px;
            background-color: #66fcf1;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="logo"><i class="fas fa-bolt"></i> ELECTRO <span>STORE</span></div>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php" class="active">About</a></li>
            <li><a href="products.php">Products</a></li>
            <li><a href="news.php">News</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </nav>

    <section class="about-section">
        <div class="title-underline"></div>
        <h1>About Us</h1>
        <p>
            ElectroStore is a leader in providing high-quality electrical appliances. 
            We focus on innovation and customer satisfaction to make your home smarter. 
            Our mission is to bring the latest technology into your everyday life with 
            efficiency and style.
        </p>
    </section>


</body>
</html>