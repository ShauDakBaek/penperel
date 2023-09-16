<?php
require '../include/conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>PenPerEl - Admin Dashboard</title>
</head>
<body>
<table>
    <tr>
        <td>PenPerEl</td>
        <td>
            <a href="index.php?menu=home">Home</a>

            <a href="index.php?menu=senarai_warden">Senarai Warden</a>

            <a href="index.php?menu=cari_peralatan">Cari Peralatan</a>

            <a href="index.php?menu=profile">Profile</a>

            <a href="../logout.php">Log Keluar</a>
        </td>
    </tr>
</table>

<?php
$menu = 'cari_peralatan'; #default value
if (isset($_GET['menu'])) {
    $menu = $_GET['menu'];
}
include "$menu.php";
?>

<?php
$nosiri = $_GET['nosiri'];

$sql = "SELECT * FROM `peralatan` WHERE `nosiri` = '$nosiri'";
$result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error);
}

$row = $result->fetch_object();

if ($row) {
    $sql2 = "SELECT * FROM `pelajar` WHERE `idpelajar` = '$row->pelajar'";
    $result2 = $conn->query($sql2);


    if (!$result2) {
        die("Query failed: " . $conn->error);
    }

    $row2 = $result2->fetch_object();
    $sql3 = "SELECT namawarden FROM warden WHERE idwarden = '$row2->warden'";
    $result3 = $conn->query($sql3);
    $row3 = $result3->fetch_object();

    if ($row2) {
        ?>
        <h3>Butiran Peralatan</h3>
        <label>No.Siri : <?php echo $row->nosiri ?></label>
        <br>
        <label>Nama Warden : <?php echo $row3->namawarden ?></label>
        <br>
        <label>Nama Pelajar : <?php echo $row2->namapelajar ?></label>
        <br>
        <label>Jenis Peralatan : <?php echo $row->jenisperalatan ?></label>
        <br>
        <label>Jenama : <?php echo $row->jenama ?></label>
        <?php
    } else {
        $namapelajar = "Pelajar not found"; // Set a default value or error message.
    }


} else {
    echo "<br><label><i>Peralatan bernombor siri: $nosiri tidak dijumpai.</i></label>";
}
?>

</body>
</html>