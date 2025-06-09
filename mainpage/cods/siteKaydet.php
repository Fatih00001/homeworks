<?php
if (isset($_GET["kod"]) && isset($_GET["data"])) {
    $kod = $_GET["kod"];
    $data = $_GET["data"];

    $sql = "INSERT INTO site (si_kod, si_data) VALUES ('$kod', '$data')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: index5.php?link=site&kod=$kod");
        exit;
    } else {
        echo "Hata oluştu: " . mysqli_error($conn);
    }
}
?>