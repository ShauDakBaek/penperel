<?php
require '../include/conn.php';

$idwarden = $_GET['idwarden'];
$sql = "DELETE FROM warden where idwarden = $idwarden";
$conn->query($sql);

header('location:index.php?menu=senarai_warden');