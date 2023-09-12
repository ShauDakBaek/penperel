<?php
require '../conn.php';

$idpelajar = $_GET['idpelajar'];
$sql = "DELETE FROM pelajar where idpelajar = $idpelajar";
$conn->query($sql);

header('location:index.php?menu=pelajar');