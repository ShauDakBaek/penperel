<?php
require '../include/conn.php';

$idwarden = $_POST['warden'];
$namapelajar = $_POST['namapelajar'];
$nokppelajar = $_POST['nokppelajar'];
$katalaluan = $_POST['katalaluan'];

$hashed = password_hash($katalaluan, PASSWORD_BCRYPT);

$sql = "INSERT INTO pelajar (warden, namapelajar, nokppelajar, kata) VALUES ('$idwarden', '$namapelajar', '$nokppelajar', '$hashed')";
$conn->query($sql);

header('location: index.php?menu=senarai_pelajar');
?>
