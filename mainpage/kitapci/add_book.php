<?php
include 'db.php';

$title = $_POST['title'];
$author = $_POST['author'];

$imageName = basename($_FILES["image"]["name"]);
$targetDir = "uploads/";
$targetFile = $targetDir . $imageName;

if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
    $stmt = $conn->prepare("INSERT INTO books (title, author, image) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $author, $imageName);
    $stmt->execute();
    $stmt->close();
    echo "Kitap başarıyla eklendi. <a href='products.php'>Kitaplara git</a>";
} else {
    echo "Resim yüklenemedi.";
}
?>
