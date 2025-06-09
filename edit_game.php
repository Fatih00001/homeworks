<?php
session_start();
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: index.php");
    exit;
}

include 'includes/db.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM games WHERE id = $id");
$game = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // görsel güncellenecekse
    if ($_FILES['image']['name']) {
        $image = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "games/" . $image);
    } else {
        $image = $game['image'];
    }

    $stmt = $conn->prepare("UPDATE games SET title=?, description=?, price=?, image=? WHERE id=?");
    $stmt->bind_param("ssdsi", $title, $description, $price, $image, $id);
    $stmt->execute();

    header("Location: admin_games.php");
    exit;
}
?>

<?php include 'includes/header.php'; ?>

<h2 style="text-align:center;">Oyun Düzenle</h2>
<form method="post" enctype="multipart/form-data" style="max-width:500px; margin:0 auto; background:#1f1f1f; padding:20px; border-radius:10px;">
    <input type="text" name="title" value="<?= htmlspecialchars($game['title']) ?>" required style="width:100%; margin-bottom:10px;">
    <textarea name="description" required style="width:100%; margin-bottom:10px;"><?= htmlspecialchars($game['description']) ?></textarea>
    <input type="number" name="price" step="0.01" value="<?= $game['price'] ?>" required style="width:100%; margin-bottom:10px;">
    <input type="file" name="image" style="width:100%; margin-bottom:10px;">
    <button type="submit">Güncelle</button>
</form>

<?php include 'includes/footer.php'; ?>
