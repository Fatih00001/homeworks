<?php
$ad = isset($_GET["ad"]) ? $_GET["ad"] : '';
$tel = isset($_GET["tel"]) ? $_GET["tel"] : '';
$mail = isset($_GET["mail"]) ? $_GET["mail"] : '';
$mesaj = isset($_GET["mesaj"]) ? $_GET["mesaj"] : '';

if (!empty($ad) && !empty($tel) && !empty($mail) && !empty($mesaj)) {
    $sql = "INSERT INTO mesajlar (id, ad, mail, tel, mesaj) VALUES (NULL, '$ad','$mail','$tel','$mesaj');";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "Kayıt başarılı!";
    } else {
        echo "Hata: " . mysqli_error($conn);
    
}
}