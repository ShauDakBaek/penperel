<h1>Selamat datang, Warden!</h1>
<br>

<?php
$idwarden = $_SESSION['idwarden'];

$sql = "SELECT COUNT(*) AS count FROM `pelajar` WHERE warden = '$idwarden'";
$result = $conn->query($sql);
$row = $result->fetch_object();

$sql3 = "SELECT COUNT(*) AS count FROM `peralatan`
JOIN `pelajar` ON peralatan.pelajar = pelajar.idpelajar
JOIN `warden` ON pelajar.warden = warden.idwarden WHERE warden = $idwarden";
$result3 = $conn->query($sql3);
$row3 = $result3->fetch_object();
?>

<h3>Jumlah Pelajar : <?php echo $row->count; ?></h3>
<h3>Jumlah Peralatan : <?php echo $row3->count; ?></h3>