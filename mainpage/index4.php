<?php
include("baglan.php");

// GÜNCELLEME KONTROLÜ
if (isset($_GET["link"]) && $_GET["link"] == "guncelle") {
    $id = (int)$_GET["id"];
    $mesaj = mysqli_real_escape_string($conn, $_GET["data"]);

    $guncelle = "UPDATE mesajlar SET mesaj='$mesaj' WHERE id=$id";
    mysqli_query($conn, $guncelle);
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Mesajlar</title>
</head>
<body>
    <h2>Kaydedilen Mesajlar</h2>
    <table border="1">
        <tr>
            <th>ID</th><th>Ad</th><th>Mail</th><th>Tel</th><th>Mesaj</th><th>İşlem</th>
        </tr>
        <?php
        $sorgu = mysqli_query($conn, "SELECT * FROM mesajlar ORDER BY id DESC");
        while($satir = mysqli_fetch_assoc($sorgu)){
            echo "<tr>
                <td>{$satir['id']}</td>
                <td>{$satir['ad']}</td>
                <td>{$satir['mail']}</td>
                <td>{$satir['tel']}</td>
                <td>{$satir['mesaj']}</td>
                <td>
                    <a href='mesaj_duzenle.php?id={$satir['id']}'>Düzenle</a> |
                    <a href='mesaj_sil.php?id={$satir['id']}' onclick=\"return confirm('Silinsin mi?')\">Sil</a>
                </td>
            </tr>";
        }
        ?>
    </table>
</body>
</html>