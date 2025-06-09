<?php
$host = "localhost";
$user = "demirale_game_store";
$pass = "123456789";
$dbname = "demirale_game_store";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Veritabanı bağlantısı başarısız: " . $conn->connect_error);
}
?>
