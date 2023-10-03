<?php
require '../include/conn.php';
if (!isset($_SESSION['idpelajar'])) header('location: ../');
$idpelajar = $_SESSION['idpelajar'];

$sql = "SELECT namapelajar FROM pelajar WHERE idpelajar=$idpelajar";
$row = $conn->query($sql)->fetch_object();
$namapelajar = $row->namapelajar;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../include/style.css">
    <title>PenPerEl - Pelajar Dashboard</title>
</head>
<body>
<table class="header">
    <tr>
        <td>PenPerEl</td>
        <td class="navbar">
            <a class="a1" href="index.php?menu=home">Home</a>

            <a href="index.php?menu=senarai_peralatan">Senarai Peralatan</a>

            <a href="index.php?menu=profile">Profile</a>

            <a href="../logout.php">Log Keluar</a>
        </td>
    </tr>
</table>

<?php
$menu = 'home'; #default value
if (isset($_GET['menu'])) {
    $menu = $_GET['menu'];
}
include "$menu.php";
?>

</body>
</html>