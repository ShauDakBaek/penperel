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
    echo "<table>";
    echo "<tr><th>ID</th><th>Nama Pelajar</th><th>Jenis Peralatan</th><th>Jenama</th><th>No Siri</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["idperalatan"] . "</td><td>" . $row["namapelajar"] . "</td><td>" . $row["jenisperalatan"] . "</td><td>" . $row["jenama"] . "</td><td>" . $row["nosiri"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "No records found.";
}

$conn->close();
?>
</body>
</html>
