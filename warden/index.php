<?php
require '../include/conn.php';
if(!isset($_SESSION['idwarden'])) header('location: ../');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>PenPerEl - Warder Dashboard</title>
</head>
<body>
<table>
    <tr>
        <td>PenPerEl</td>
        <td>
            <a href="index.php?menu=home">Home</a>

            <a href="index.php?menu=senarai_pelajar">Senarai Pelajar</a>

            <a href="index.php?menu=tukarkata">Tukar Kata Laluan</a>

            <a href="../include/logout.php">Log Keluar</a>
        </td>
    </tr>
</table>

<?php
$menu = 'home'; #default value
if(isset($_GET['menu'])){
    $menu=$_GET['menu'];
}
include "$menu.php";
?>

</body>
</html>