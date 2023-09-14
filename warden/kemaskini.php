<?php
require '../include/conn.php';

$idpelajar=$_POST['idpelajar'];
$namapelajar = $_POST['namapelajar'];
$nokppelajar = $_POST['nokppelajar'];
$kata = $_POST['kata'];

$hashed = password_hash('$kata', PASSWORD_BCRYPT);

$sql = "UPDATE pelajar
        SET namapelajar = '$namapelajar', nokppelajar = '$nokppelajar', kata='$hashed'
        WHERE idpelajar = $idpelajar";
$conn->query($sql);

header('location: index.php?menu=senarai_pelajar');