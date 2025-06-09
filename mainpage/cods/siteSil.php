<?php
if (isset($_GET["id"]) && isset($_GET["kod"])) {
    $id = $_GET["id"];
    $kod = $_GET["kod"];

    $sql = "DELETE FROM site WHERE si_id=$id";
    mysqli_query($conn, $sql);

    header("Location: index5.php?link=site&kod=$kod");
    exit;
} else {
    echo "Eksik parametre!";
}
?>