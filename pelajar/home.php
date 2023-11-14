<?php
$idpelajar = $_SESSION['idpelajar'];

$sql = "SELECT namapelajar FROM pelajar WHERE idpelajar=$idpelajar";
$row = $conn->query($sql)->fetch_object();
$namapelajar = $row->namapelajar;

$sql = "SELECT COUNT(*) AS count FROM peralatan WHERE pelajar = $idpelajar";
$result = $conn->query($sql);
$row = $result->fetch_object();
?>
<h1><?php echo "Selamat Datang, $namapelajar" ?></h1>
<br>

<h3>Jumlah Peralatan Elektrik: <?php echo $row->count; ?></h3>
