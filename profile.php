<?php
include 'includes/db.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'];
?>

<?php include 'includes/header.php'; ?>

<h2 style="text-align:center;">Profil Sayfası</h2>
<div style="max-width:600px; margin:0 auto; background:#1f1f1f; padding:20px; border-radius:10px;">
    <p><strong>Kullanıcı Adı:</strong> <?= htmlspecialchars($username) ?></p>
    <p><strong>Sepet Özelliği:</strong> (Opsiyonel olarak eklenebilir)</p>
</div>

<?php include 'includes/footer.php'; ?>
