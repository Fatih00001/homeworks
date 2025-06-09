<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8" />
    <title>Oyun Mağazası</title>
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <nav class="navbar">
        <a href="index.php" class="logo">GameStore</a>
        <ul class="nav-links">
            <li><a href="index.php">Anasayfa</a></li>
            <li><a href="mainpage/index.html" target="_blank">Ödevlerim</a></li>
            <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] === true): ?>
                <li><a href="add_game.php">Yeni Oyun Ekle</a></li>
                <li><a href="admin_games.php">Oyunları Yönet</a></li>

                
                <?php endif; ?>
            </ul>
            <div class="nav-user dropdown">
                <?php if (isset($_SESSION['username'])): ?>
                    <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] === true): ?>
                        <button class="dropbtn">admin</button>
                        <div class="dropdown-content">
                            <a href="logout.php">Çıkış Yap</a>
                        </div>
                        <?php else: ?>
                            <button class="dropbtn"><?= htmlspecialchars($_SESSION['username']) ?></button>
                            <div class="dropdown-content">
                                <a href="profile.php">Profilim</a>
                                <a href="logout.php">Çıkış Yap</a>

                                <?php if (isset($_SESSION['username']) && empty($_SESSION['admin'])): ?>
                                    <a href="cart.php">Sepetim</a>
                                <?php endif; ?>

                    </div>
                <?php endif; ?>
            <?php else: ?>
                <button class="dropbtn">Giriş Yap</button>
                <div class="dropdown-content">
                    <a href="login.php">Giriş Yap</a>
                    <a href="register.php">Hesap Oluştur</a>
                </div>
            <?php endif; ?>
        </div>
    </nav>
    <main>