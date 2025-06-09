<?php
session_start();
include 'includes/db.php';
include 'includes/header.php';

echo "<h2 style='text-align:center;'>Sepetim</h2>";

if (!isset($_SESSION['cart']) || count($_SESSION['cart']) === 0) {
    echo "<p style='text-align:center;'>Sepetiniz boş.</p>";
} else {
    echo "<div style='max-width:800px; margin:0 auto;'>";
    $ids = implode(',', array_map('intval', $_SESSION['cart']));
    $result = $conn->query("SELECT * FROM games WHERE id IN ($ids)");

    $total = 0;
    while ($game = $result->fetch_assoc()) {
        $total += $game['price'];
        echo "<div style='display:flex; align-items:center; background:#1f1f1f; margin:10px 0; padding:10px; border-radius:10px;'>";
        echo "<img src='games/{$game['image']}' width='80' style='border-radius:5px; margin-right:15px;'>";
        echo "<div><strong>{$game['title']}</strong><br>{$game['price']} ₺</div>";
        echo "<form method='post' action='remove_from_cart.php' style='margin-left:auto;'>
                <input type='hidden' name='game_id' value='{$game['id']}'>
                <button type='submit' style='background:red; color:white; padding:6px 10px; border:none; border-radius:5px;'>Kaldır</button>
              </form>";
        echo "</div>";
    }

    echo "<h3 style='text-align:right;'>Toplam: {$total} ₺</h3>";
    echo "</div>";
}

include 'includes/footer.php';
