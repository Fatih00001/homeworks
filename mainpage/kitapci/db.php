<?php
$host = "localhost";
$user = "demirale_ornek"; 
$pass = "34323259585958";
$db = "demirale_ornek";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}
?>