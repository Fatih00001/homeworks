<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'db.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>



<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Bilgi Kütüphanesi</a>
            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Anasayfa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="products.php">Ürünler</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="aboutus.php">Hakkımızda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin.php">Admin Paneli</a>
                </li>
            </ul>
        </div>
    </nav>
<center>
    <h2>Ürünler</h2>
    <div class="books">
        <?php
        $result = $conn->query("SELECT * FROM books");
        while ($row = $result->fetch_assoc()) {
            echo "<div class='book'>";
            echo "<img src='uploads/{$row['image']}' width='100'><br>";
            echo "<strong>" . htmlspecialchars($row['title']) . "</strong><br>";
            echo "Yazar: " . htmlspecialchars($row['author']);
            echo "</div>";

            echo "<form action='delete_book.php' method='post' onsubmit='return confirm(\"Bu kitabı silmek istediğine emin misin?\")'>";
            echo "<input type='hidden' name='id' value='{$row['id']}'>";
            echo "<input type='hidden' name='image' value='{$row['image']}'>";
            echo "<input type='submit' value='Sil'>";
            echo "</form>";

            echo "<hr></div>";
        }
        ?>
    </div>


</center>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>