<?php
session_start();
include 'includes/db.php';
?>
<?php include 'includes/header.php'; ?>

<!-- Arama ve Filtre Formu -->
<div style="">
    <form method="get" action="index.php" style="display:flex; justify-content:center; gap:10px; flex-wrap: wrap;">
        <input type="text" name="search" placeholder="Oyun adı ara..."
            value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>"
            style="padding:8px; flex:1; min-width:150px; border-radius:5px; border:none;">
        <button type="submit"
            style="padding:8px 20px; background:#3a3a3a; border:none; border-radius:5px; color:#fff; cursor:pointer;">Ara</button>
    </form>
</div>

<h1 style="text-align:center; margin-top:30px;">Oyun Mağazasına Hoş Geldiniz</h1>

<?php
// Arama ve filtre parametrelerini al
$search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';
$genre = isset($_GET['genre']) ? $conn->real_escape_string($_GET['genre']) : '';

// SQL sorgusu oluştur
$sql = "SELECT * FROM games WHERE 1";

if ($search !== '') {
    $sql .= " AND title LIKE '%$search%'";
}

if ($genre !== '') {
    $sql .= " AND genre = '$genre'";
}

$result = $conn->query($sql);
?>

<div style="display:flex; flex-wrap:wrap; justify-content:center; gap:20px; margin:20px;">
    <?php while ($row = $result->fetch_assoc()): ?>
        <div style="background:#1f1f1f; padding:15px; border-radius:8px; width:200px;">
            <img src="games/<?= htmlspecialchars($row['image']) ?>" alt="<?= htmlspecialchars($row['title']) ?>"
                style="width:100%; border-radius:5px;">
            <h3><?= htmlspecialchars($row['title']) ?></h3>
            <p><?= htmlspecialchars($row['price']) ?> ₺</p>

            <form method="post" action="add_to_cart.php">
                <input type="hidden" name="game_id" value="<?= htmlspecialchars($row['id']) ?>">
                <button type="submit"
                    style="background:#3a3a3a; border:none; padding:8px 12px; border-radius:5px; color:#fff; cursor:pointer;">Sepete
                    Ekle</button>
            </form>
        </div>
    <?php endwhile; ?>
</div>

<?php include 'includes/footer.php'; ?>