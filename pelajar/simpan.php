<?php
require '../include/conn.php';
$idpelajar=$_SESSION['idpelajar'];

$jenisperalatan = $_POST['jenisperalatan'];
$jenama = $_POST['jenama'];
$nosiri = $_POST['nosiri'];

$sql = "INSERT INTO peralatan VALUES(null, '$idpelajar', '$jenisperalatan', '$jenama', '$nosiri')";
$conn->query($sql);

header('location: index.php?menu=senarai_peralatan');