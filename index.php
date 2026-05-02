<?php
require_once __DIR__ . "/config/config.php";

$sliders = [];
$r = $conn->query("SELECT * FROM sliders WHERE is_active=1 ORDER BY sort_order ASC, id DESC");
while ($row = $r->fetch_assoc()) $sliders[] = $row;

$products = [];
$r2 = $conn->query("SELECT * FROM products WHERE is_active=1 ORDER BY id DESC LIMIT 12");
while ($row = $r2->fetch_assoc()) $products[] = $row;
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>ElectroStore</title>
</head>
<body>

  <header>
    <nav>
      <a href="index.php">Home</a>
      <a href="products.php">Products</a>
      <a href="cart.php">Cart</a>

      <?php if (!isset($_SESSION['user_id'])): ?>
        <a href="auth/login.php">Login</a>
        <a href="auth/register.php">Register</a>
      <?php else: ?>
        <span>Hi, <?php echo htmlspecialchars($_SESSION['user_name']); ?></span>
        <a href="auth/logout.php">Logout</a>
        <?php if (($_SESSION['role'] ?? '') === 'admin'): ?>
          <a href="admin/dashboard.php">Dashboard</a>
        <?php endif; ?>
      <?php endif; ?>
    </nav>
  </header>

  <section>
    <?php foreach ($sliders as $s): ?>
      <div style="border:1px solid #ddd; margin:10px; padding:10px;">
        <img src="public/<?php echo htmlspecialchars($s['image_path']); ?>" style="max-width:100%;height:auto;">
        <h2><?php echo htmlspecialchars($s['title']); ?></h2>
        <?php if ($s['subtitle']): ?><p><?php echo htmlspecialchars($s['subtitle']); ?></p><?php endif; ?>
      </div>
    <?php endforeach; ?>
  </section>

  <section>
    <h2>Featured</h2>
    <div style="display:flex;flex-wrap:wrap;gap:16px;">
      <?php foreach ($products as $p): ?>
        <div style="width:240px;border:1px solid #ddd;padding:10px;">
          <?php if ($p['image_path']): ?>
            <img src="public/<?php echo htmlspecialchars($p['image_path']); ?>" style="max-width:100%;height:160px;object-fit:contain;">
          <?php endif; ?>
          <h3><?php echo htmlspecialchars($p['name']); ?></h3>
          <p><b>$<?php echo htmlspecialchars($p['price']); ?></b></p>
          <a href="#" onclick="addToCart(<?php echo (int)$p['id']; ?>); return false;">Add to Cart</a>
        </div>
      <?php endforeach; ?>
    </div>
  </section>

<script>
async function addToCart(productId){
  const res = await fetch('api/cart.php?action=add', {
    method: 'POST',
    headers: {'Content-Type':'application/json'},
    body: JSON.stringify({product_id: productId, qty: 1})
  });
  const data = await res.json();
  alert(data.message || 'Added');
}
</script>

</body>
</html>