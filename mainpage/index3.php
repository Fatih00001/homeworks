<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .modal-content {
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body class="bg-light">

    <div class="container mt-5">
        <form method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="İsim, Email, Şehir, Meslek veya Seviye Ara..." value="<?php echo isset($_GET['q']) ? htmlspecialchars($_GET['q']) : ''; ?>">
                <button class="btn btn-outline-primary" type="submit">Ara</button>
            </div>
        </form>
        <h1 class="text-center mb-4">Kullanıcı Listesi</h1>

        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>İsim</th>
                    <th>Email</th>
                    <th>Şehir</th>
                    <th>Meslek</th>
                    <th>Seviye</th>
                    <th>Detay</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $mysqli = mysqli_connect("localhost", "demirale_ornek", "34323259585958", "demirale_ornek");
                $result = mysqli_query($mysqli, "SELECT * FROM kullanici_profilleri");

                $q = mysqli_real_escape_string($mysqli, $_GET['q'] ?? '');
                $sql = "SELECT * FROM kullanici_profilleri";

                if (!empty($q)) {
                    $like = "'%" . $q . "%'";
                    $sql .= " WHERE 
        isim LIKE $like OR 
        soyisim LIKE $like OR 
        email LIKE $like OR 
        sehir LIKE $like OR 
        seviye LIKE $like";
                }

                $result = mysqli_query($mysqli, $sql);

                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row["id"];
                        echo "<tr>";
                        echo "<td>{$id}</td>";
                        echo "<td>{$row['isim']} {$row['soyisim']}</td>";
                        echo "<td>{$row['email']}</td>";
                        echo "<td>{$row['sehir']}</td>";
                        echo "<td>{$row['meslek']}</td>";
                        echo "<td>{$row['seviye']}</td>";
                        echo "<td><button class='btn btn-sm btn-primary' data-bs-toggle='modal' data-bs-target='#modal$id'>Detay</button></td>";
                        echo "</tr>";

                        // Modal içeriği
                        echo "
        <div class='modal fade' id='modal$id' tabindex='-1'>
          <div class='modal-dialog modal-lg'>
            <div class='modal-content'>
              <div class='modal-header'>
                <h5 class='modal-title'>{$row['isim']} {$row['soyisim']} - Detaylar</h5>
                <button type='button' class='btn-close' data-bs-dismiss='modal'></button>
              </div>
              <div class='modal-body'>
                <ul class='list-group'>
                  <li class='list-group-item'><strong>ID:</strong> {$row['id']}</li>
                  <li class='list-group-item'><strong>Kullanıcı Adı:</strong> {$row['kullanici_adi']}</li>
                  <li class='list-group-item'><strong>Email:</strong> {$row['email']}</li>
                  <li class='list-group-item'><strong>Telefon:</strong> {$row['telefon']}</li>
                  <li class='list-group-item'><strong>Adres:</strong> {$row['adres']}</li>
                  <li class='list-group-item'><strong>Şehir:</strong> {$row['sehir']}</li>
                  <li class='list-group-item'><strong>Ülke:</strong> {$row['ulke']}</li>
                  <li class='list-group-item'><strong>Doğum Tarihi:</strong> {$row['dogum_tarihi']}</li>
                  <li class='list-group-item'><strong>Cinsiyet:</strong> {$row['cinsiyet']}</li>
                  <li class='list-group-item'><strong>Kayıt Tarihi:</strong> {$row['kayit_tarihi']}</li>
                  <li class='list-group-item'><strong>Son Giriş:</strong> {$row['son_giris']}</li>
                  <li class='list-group-item'><strong>Aktif mi:</strong> " . ($row['aktif_mi'] ? 'Evet' : 'Hayır') . "</li>
                  <li class='list-group-item'><strong>Profil Resmi:</strong> {$row['profil_resmi']}</li>
                  <li class='list-group-item'><strong>Hakkında:</strong> {$row['hakkinda']}</li>
                  <li class='list-group-item'><strong>Favori Renk:</strong> {$row['favori_renk']}</li>
                  <li class='list-group-item'><strong>Meslek:</strong> {$row['meslek']}</li>
                  <li class='list-group-item'><strong>Seviye:</strong> {$row['seviye']}</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        ";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>