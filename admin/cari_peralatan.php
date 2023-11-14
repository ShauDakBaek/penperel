<h2>Cari Peralatan</h2>
<form action="cari.php" method="post">
    <input name="nosiri" placeholder="No. Siri Peralatan" required>
    <button type="submit">Cari</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['nosiri'])) {
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
        echo "<br><label><i>Peralatan bernombor siri: $nosiri tidak dijumpai.</i></label>";
    }
}
?>