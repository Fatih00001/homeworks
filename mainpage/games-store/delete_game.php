<?php
session_start();
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: index.php");
    exit;
}

include 'includes/db.php';

$id = $_GET['id'];
$conn->query("DELETE FROM games WHERE id = $id");

header("Location: admin_games.php");
exit;
