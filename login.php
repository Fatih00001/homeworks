<?php include 'includes/db.php'; session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $isAdminLogin = isset($_GET['admin']);

    $stmt = $conn->prepare("SELECT * FROM users WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $user = $stmt->get_result()->fetch_assoc();

    if ($user && $password === $user['password']) {
        $_SESSION['username'] = $user['username'];
        $_SESSION['admin'] = $user['is_admin'] == 1;

        header("Location: index.php");
        exit;
    } else {
        echo "Hatalı giriş!";
    }
}
?>

<?php include 'includes/header.php'; ?>

<h2 style="text-align:center;">Giriş Yap</h2>
<form method="post" style="max-width:400px; margin:0 auto; background:#1f1f1f; padding:20px; border-radius:10px;">
    <input type="text" name="username" placeholder="Kullanıcı Adı" required style="width:100%; margin-bottom:10px;">
    <input type="password" name="password" placeholder="Şifre" required style="width:100%; margin-bottom:10px;">
    <button type="submit" style="width:100%; background:#00ffff; border:none; padding:10px;">Giriş Yap</button>
</form>

<?php include 'includes/footer.php'; ?>
