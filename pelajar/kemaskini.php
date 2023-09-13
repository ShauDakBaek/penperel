<?php
require '../include/conn.php';

$idperalatan=$_POST['idperalatan'];
$jenisperalatan=$_POST['jenisperalatan'];
$jenama = $_POST['jenama'];
$nosiri = $_POST['nosiri'];


$sql = "UPDATE peralatan
        SET jenisperalatan = '$jenisperalatan', jenama = '$jenama', nosiri='$nosiri'
        WHERE idperalatan = $idperalatan";
$conn->query($sql);

header('location: index.php?menu=senarai_peralatan');