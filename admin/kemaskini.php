<?php
require '../include/conn.php';

$idwarden=$_POST['idwarden'];
$namawarden = $_POST['namawarden'];
$nokpwarden = $_POST['nokpwarden'];
$kata = $_POST['kata'];

$hashed = password_hash('$kata', PASSWORD_BCRYPT);

$sql = "UPDATE warden
        SET namawarden = '$namawarden', nokpwarden = '$nokpwarden', kata='$hashed'
        WHERE idwarden = $idwarden";
$conn->query($sql);

header('location: index.php?menu=senarai_warden');