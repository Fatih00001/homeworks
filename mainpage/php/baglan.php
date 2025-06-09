<?php
$server="localhost";
$user="demirale_net12h";
$pass="34323259585958";
$db="demirale_net12h";
$conn = mysqli_connect($server, $user, $pass, $db);
if (mysqli_connect_errno()) {
    echo "Veri tabanina bağlanti yapilamadi" . mysqli_connect_error();
}
