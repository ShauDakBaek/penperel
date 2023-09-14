<?php
require '../include/conn.php';

$idpelajar = $_GET['idpelajar'];
$sqlCheck = "SELECT * FROM pelajar WHERE idpelajar = '$idpelajar'";
$result = $conn->query($sqlCheck);
$row = $result->fetch_object();

$hashed = password_hash($row->nokppelajar, PASSWORD_BCRYPT);

$sqlReset = "UPDATE pelajar SET kata = '$hashed' WHERE idpelajar = '$idpelajar'";
$conn->query($sqlReset);

header('location:index.php?menu=senarai_pelajar');
?>