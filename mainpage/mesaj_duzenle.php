<?php
include("baglan.php");

if (isset($_GET["id"])) {
    $id = (int)$_GET["id"];
    $sql = "SELECT * FROM mesajlar WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    $veri = mysqli_fetch_assoc($result);
} else {
    echo "Eksik parametre!";
    exit;
}
?>

<form action="index4.php" method="get">
    <input type="hidden" name="link" value="guncelle">
    <input type="hidden" name="id" value="<?= $veri["id"] ?>">

    <label for="data">Mesaj</label><br>
    <textarea name="data" id="data" rows="5" cols="50"><?= htmlspecialchars($veri["mesaj"]) ?></textarea><br>
    <button type="submit">Güncelle</button>
</form>