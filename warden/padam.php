<?php
require '../include/conn.php';

if (isset($_GET['idpelajar'])) {
    $idpelajar = $_GET['idpelajar'];

    $sql = "DELETE FROM pelajar WHERE idpelajar = $idpelajar";

    if ($conn->query($sql)) {

        header('Location: index.php?menu=senarai_pelajar');
        exit();
    } else {

        echo "Error: " . $conn->error;
    }
} else {

    echo "ID not provided.";
}
?>
