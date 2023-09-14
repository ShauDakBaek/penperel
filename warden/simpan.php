<?php
require '../include/conn.php';

$namapelajar = $_POST['namapelajar'];
$nokppelajar = $_POST['nokppelajar'];
$katalaluan = $_POST['katalaluan'];

$hashed = password_hash($katalaluan, PASSWORD_BCRYPT);

$sql = "INSERT INTO pelajar (namapelajar, nokppelajar, kata) VALUES ($namapelajar', '$nokppelajar', '$hashed')";
$conn->query($sql);

header('location: index.php?menu=senarai_pelajar');
?>
