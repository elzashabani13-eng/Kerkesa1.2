<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Cart | ElectroStore</title>
    <link rel="stylesheet" href="assets/style.css">
    <style>
        body { background: #0b0c10; color: white; padding: 50px; font-family: Arial; }
        .cart-table { width: 100%; border-collapse: collapse; margin-top: 30px; }
        .cart-table th, .cart-table td { padding: 15px; border-bottom: 1px solid #1f2833; text-align: left; }
        .cart-table th { color: #66fcf1; }
        .checkout-btn { background: #66fcf1; color: #0b0c10; padding: 15px 30px; border: none; border-radius: 5px; cursor: pointer; font-weight: bold; text-decoration: none; display: inline-block; margin-top: 20px; }
    </style>
</head>
<body>
    <h1>Shopping Cart</h1>

    <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])): ?>
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $grand_total = 0;
                foreach ($_SESSION['cart'] as $id => $item): 
                    $total = $item['price'] * $item['quantity'];
                    $grand_total += $total;
                ?>
                <tr>
                    <td>
                        <img src="uploads/<?= $item['image'] ?>" width="50" style="margin-right: 10px; vertical-align: middle;">
                        <?= htmlspecialchars($item['title']) ?>
                    </td>
                    <td>€<?= $item['price'] ?></td>
                    <td><?= $item['quantity'] ?></td>
                    <td>€<?= number_format($total, 2) ?></td>
                    <td><a href="remove_from_cart.php?id=<?= $id ?>" style="color: #ff4d4d;">Remove</a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <div style="text-align: right; margin-top: 20px;">
            <h3>Grand Total: €<?= number_format($grand_total, 2) ?></h3>
            <a href="checkout.php" class="checkout-btn">Proceed to Checkout</a>
        </div>
    <?php else: ?>
        <p>Your cart is empty. <a href="products.php" style="color: #66fcf1;">Go shopping!</a></p>
    <?php endif; ?>

</body>
</html>