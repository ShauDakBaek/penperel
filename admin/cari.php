<?php
require '../include/conn.php';

$menu = 'cari_peralatan'; # default value
if (isset($_GET['menu'])) {
    $menu = $_GET['menu'];
}
include "$menu.php";

$nosiri = $_POST['nosiri'];

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

    header("Location: index.php?menu=cari_peralatan&nosiri=$nosiri");
    exit();
} else {
    header("Location: index.php?menu=cari_peralatan&nosiri=$nosiri");
    exit();
}