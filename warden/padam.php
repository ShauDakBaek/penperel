<?php
require '../include/conn.php';

$idpelajar = $_GET['idpelajar'];

$sql1 = "SELECT COUNT(*) AS count FROM peralatan WHERE pelajar = $idpelajar";
$result1 = $conn->query($sql1);
$row1 = $result1->fetch_object();

if (!$row1->count == 0) {
    ?>
    <script>
        alert('Ralat : Pelajar mempunyai peralatan yang didaftarkan olehnya.');
        window.location = 'index.php?menu=senarai_pelajar';
    </script>
    <?php
} else {
    $sql = "DELETE FROM pelajar where idpelajar = $idpelajar";
    $conn->query($sql);

    header('location:index.php?menu=senarai_pelajar');
}