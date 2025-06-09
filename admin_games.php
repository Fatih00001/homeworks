<?php
session_start();
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: index.php");
    exit;
}

include 'includes/db.php';
include 'includes/header.php';
?>

<h2 style="text-align:center;">Oyun Yönetimi</h2>

<div style="max-width:1000px; margin:0 auto;">
    <table style="width:100%; background:#1f1f1f; color:white; border-collapse:collapse;">
        <tr style="background:#292929;">
            <th style="padding:10px;">ID</th>
            <th>Görsel</th>
            <th>Başlık</th>
            <th>Fiyat</th>
            <th>İşlemler</th>
        </tr>
        <?php
        $result = $conn->query("SELECT * FROM games");
        while ($game = $result->fetch_assoc()):
        ?>
        <tr style="border-bottom:1px solid #333;">
            <td style="padding:10px;"><?= $game['id'] ?></td>
            <td><img src="games/<?= $game['image'] ?>" width="80" style="border-radius:5px;"></td>
            <td><?= htmlspecialchars($game['title']) ?></td>
            <td><?= $game['price'] ?> ₺</td>
            <td>
                <a href="edit_game.php?id=<?= $game['id'] ?>" style="color: #00fff7; margin-right:10px;">Düzenle</a>
                <a href="delete_game.php?id=<?= $game['id'] ?>" style="color: red;" onclick="return confirm('Silmek istediğine emin misin?');">Sil</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>

<?php include 'includes/footer.php'; ?>
