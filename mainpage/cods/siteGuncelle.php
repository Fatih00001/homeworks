<?php
if (isset($_GET["id"]) && isset($_GET["kod"]) && isset($_GET["data"])) {
    $id = $_GET["id"];
    $kod = $_GET["kod"];
    $data = $_GET["data"];

    $sql = "UPDATE site SET si_data='$data' WHERE si_id=$id";
    mysqli_query($conn, $sql);

    header("Location: index5.php?link=site&kod=$kod");
    exit;
} else {
    echo "Eksik parametre!";
}
?>