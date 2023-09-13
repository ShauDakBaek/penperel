<?php
require '../include/conn.php';

$idperalatan = $_GET['idperalatan'];
$sql = "DELETE FROM peralatan where idperalatan = $idperalatan";
$conn->query($sql);

header('location:index.php');