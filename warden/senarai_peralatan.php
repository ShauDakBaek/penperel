<!DOCTYPE html>
<html>
<head>
    <title>Senarai Peralatan</title>
</head>
<body>
<h1>Senarai Peralatan</h1>

<?php

$idwarden = $_SESSION['idwarden'];

$sql = "SELECT peralatan.idperalatan, pelajar.namapelajar, peralatan.jenisperalatan, peralatan.jenama, peralatan.nosiri
        FROM peralatan
        INNER JOIN pelajar ON peralatan.pelajar = pelajar.idpelajar
        WHERE pelajar.warden = '$idwarden'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    ?>
    <table>
        <tr>
            <th>Id</th>
            <th>Nama Pelajar</th>
            <th>Jenis Peralatan</th>
            <th>Jenama</th>
            <th>No Siri</th>
        </tr>
        <?php
        while ($row = $result->fetch_object()) {
            ?>
            <tr>
                <td><?php echo $row->idperalatan ?></td>
                <td><?php echo $row->namapelajar ?></td>
                <td><?php echo $row->jenisperalatan ?></td>
                <td><?php echo $row->jenama ?></td>
                <td><?php echo $row->nosiri ?></td>
            </tr>
            <?php
        }
        ?>
    </table>
    <?php
} else {
    echo "No records found.";
}

$conn->close();
?>
</body>
</html>
