<?php include 'includes/db.php'; session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        $_SESSION['username'] = $username;
        $_SESSION['admin'] = false;
        header("Location: index.php");
        exit;
    } else {
        echo "Kayıt başarısız: " . $conn->error;
    }
}
?>

<?php include 'includes/header.php'; ?>

<h2 style="text-align:center;">Hesap Oluştur</h2>
<form method="post" style="max-width:400px; margin:0 auto; background:#1f1f1f; padding:20px; border-radius:10px;">
    <input type="text" name="username" placeholder="Kullanıcı Adı" required style="width:100%; margin-bottom:10px;">
    <input type="password" name="password" placeholder="Şifre" required style="width:100%; margin-bottom:10px;">
    <button type="submit" style="width:100%; background:#00ffff; border:none; padding:10px;">Kayıt Ol</button>
</form>

<?php include 'includes/footer.php'; ?>
