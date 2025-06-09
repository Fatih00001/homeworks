<?php
$server="localhost";
$user="demirale_net12h";
$pass="34323259585958";
$db="demirale_net12h";
$conn = mysqli_connect($server, $user, $pass, $db);

if (!$conn) {
    die("Bağlantı hatası: " . mysqli_connect_error());
}
?>