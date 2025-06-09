<?php
include 'includes/db.php';
session_start();

if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];


    $price = $_POST['price'];
    
    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];

    // Görseli games klasörüne yükle
    move_uploaded_file($tmp_name, "games/" . $image);

    $stmt = $conn->prepare("INSERT INTO games (title, description, price, image) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssds", $title, $description, $price, $image);

    if ($stmt->execute()) {
        echo "<p style='color:lime;'>Oyun başarıyla eklendi!</p>";
    } else {
        echo "<p style='color:red;'>Hata: " . $conn->error . "</p>";
    }
}
?>

<?php include 'includes/header.php'; ?>

<h2 style="text-align:center;">Yeni Oyun Ekle</h2>
<form method="post" enctype="multipart/form-data" style="max-width:500px; margin:0 auto; background:#1f1f1f; padding:20px; border-radius:10px;">
    <input type="text" name="title" placeholder="Oyun Başlığı" required style="width:100%; margin-bottom:10px;">
    
    <input type="number" name="price" step="0.01" placeholder="Fiyat (₺)" required style="width:100%; margin-bottom:10px;">
    <input type="file" name="image" required style="width:100%; margin-bottom:10px;">
    <button type="submit" style="width:100%; background:#00ffff; border:none; padding:10px;">Oyun Ekle</button>
</form>

<?php include 'includes/footer.php'; ?>
