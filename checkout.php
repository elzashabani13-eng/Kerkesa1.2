<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$total = 150.00; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkout | ElectroStore</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <nav class="navbar">
        <div class="logo">ELECTRO <span>STORE</span></div>
    </nav>

    <section class="products-section">
        <div class="section-title"><h2>Checkout</h2></div>
        
        <div class="product-card" style="max-width: 500px; margin: auto; text-align: left;">
            <h3>Përmbledhja e Porosisë</h3>
            <p>Total për të paguar: <strong>€<?= number_format($total, 2) ?></strong></p>
            <hr style="margin: 20px 0; opacity: 0.2;">

            <form action="checkout_process.php" method="POST">
                <div style="margin-bottom: 15px;">
                    <label>Adresa e Transportit:</label>
                    <input type="text" name="address" required style="width: 100%; padding: 10px; margin-top: 5px; border-radius: 5px; border: 1px solid #232936; background: #0b0e14; color: white;">
                </div>
                <div style="margin-bottom: 15px;">
                    <label>Numri i Telefonit:</label>
                    <input type="text" name="phone" required style="width: 100%; padding: 10px; margin-top: 5px; border-radius: 5px; border: 1px solid #232936; background: #0b0e14; color: white;">
                </div>
                <button type="submit" class="btn-shop" style="width: 100%; border: none; cursor: pointer;">Përfundo Porosinë</button>
            </form>
        </div>
    </section>
</body>
</html>