<?php
require '../include/conn.php';
$idpelajar = $_SESSION['idpelajar'];

$jenisperalatan = $_POST['jenisperalatan'];
$jenama = $_POST['jenama'];
$nosiri = $_POST['nosiri'];

$sqlCheck = "SELECT * FROM peralatan WHERE nosiri = '$nosiri'";
$result = $conn->query($sqlCheck);

if($row = $result->num_rows == 0){
    $sql = "INSERT INTO peralatan VALUES(null, '$idpelajar', '$jenisperalatan', '$jenama', '$nosiri')";
    $conn->query($sql);
    header('location: index.php?menu=senarai_peralatan');
}else {
    ?>
    <script>
    alert('No Siri teleh wujud.');
    window.location = 'index.php?menu=senarai_peralatan';
    </script>
    <?php
}