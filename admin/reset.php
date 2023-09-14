<?php
require '../include/conn.php';

$idwarden = $_GET['idwarden'];
$sqlCheck = "SELECT * FROM warden WHERE idwarden = '$idwarden'";
$result = $conn->query($sqlCheck);
$row = $result->fetch_object();

$hashed = password_hash($row->nokpwarden, PASSWORD_BCRYPT);

$sqlReset = "UPDATE warden SET kata = '$hashed' WHERE idwarden = '$idwarden'";
$conn->query($sqlReset);

header('location:index.php?menu=senarai_warden');
?>