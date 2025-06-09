<?php
include("baglan.php");

$id = (int)($_GET["id"] ?? 0);
mysqli_query($conn, "DELETE FROM mesajlar WHERE id=$id");

// Silindikten sonra geri yönlendir
header("Location: index4.php");
exit();