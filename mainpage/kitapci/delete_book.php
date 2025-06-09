<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $image = $_POST['image'];
    $imagePath = "uploads/" . $image;

    // Veritabanından sil
    $stmt = $conn->prepare("DELETE FROM books WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();

    // Resim dosyasını sil
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }

    // Geri yönlendirme
    header("Location: products.php");
    exit();
}
?>
