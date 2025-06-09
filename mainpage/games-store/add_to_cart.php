<?php
session_start();
include 'includes/db.php';

// 1. game_id kontrolü
if (!isset($_POST['game_id']) || !is_numeric($_POST['game_id'])) {
    die("Geçersiz oyun ID'si.");
}

$game_id = intval($_POST['game_id']);

// 2. Sepet dizisini oluştur
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// 3. Daha önce eklenmemişse sepete ekle
if (!in_array($game_id, $_SESSION['cart'])) {
    $_SESSION['cart'][] = $game_id;
}

// 4. Test için geçici yazdırma (geçici olarak yorum satırına alabilirsin)
/*
echo "<pre>";
print_r($_SESSION['cart']);
exit;
*/

// 5. Anasayfaya geri dön
header("Location: index.php");
exit;
