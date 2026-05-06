<?php
session_start();
require_once "../classes/Settings.php"; 

$settings = new Settings();
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['hero_title'];
    $subtitle = $_POST['hero_subtitle'];
    
    $res1 = $settings->updateContent('hero_title', $title);
    $res2 = $settings->updateContent('hero_subtitle', $subtitle);

    if ($res1 && $res2) {
        $message = "<p style='color: #00d2ff;'>Ndryshimet u ruajtën me sukses!</p>";
    } else {
        $message = "<p style='color: #ff4d4d;'>Pati një gabim gjatë ruajtjes.</p>";
    }
}

$current_title = $settings->getContent('hero_title');
$current_subtitle = $settings->getContent('hero_subtitle');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Home Content | Admin</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <div class="products-section">
        <div class="section-title">
            <h2>Menaxho Përmbajtjen e Home</h2>
        </div>

        <div class="product-card" style="max-width: 600px; margin: auto; text-align: left;">
            <?php echo $message; ?>
            
            <form action="edit_home.php" method="POST">
                <div style="margin-bottom: 20px;">
                    <label style="display:block; margin-bottom: 5px;">Titulli Kryesor (Hero Title):</label>
                    <input type="text" name="hero_title" value="<?= htmlspecialchars($current_title) ?>" 
                           style="width: 100%; padding: 12px; background: #0b0e14; color: white; border: 1px solid #232936; border-radius: 8px;">
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display:block; margin-bottom: 5px;">Nëntitulli (Hero Subtitle):</label>
                    <textarea name="hero_subtitle" rows="4" 
                              style="width: 100%; padding: 12px; background: #0b0e14; color: white; border: 1px solid #232936; border-radius: 8px;"><?= htmlspecialchars($current_subtitle) ?></textarea>
                </div>

                <button type="submit" class="btn-shop" style="width: 100%; border: none; cursor: pointer;">
                    Ruaj Ndryshimet
                </button>
            </form>
            
            <br>
            <a href="dashboard.php" style="color: #ccc; text-decoration: none; font-size: 0.9rem;">← Kthehu te Dashboard</a>
        </div>
    </div>
</body>
</html>