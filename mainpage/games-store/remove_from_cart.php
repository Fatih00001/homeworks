<?php
session_start();

if (isset($_POST['game_id'])) {
    $id = intval($_POST['game_id']);
    if (isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array_diff($_SESSION['cart'], [$id]);
    }
}

header("Location: cart.php");
exit;
