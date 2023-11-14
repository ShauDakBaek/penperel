<?php
$idpelajar = $_SESSION['idpelajar'];
?>
<h2>Senarai Peralatan Elektrik</h2>
<?php
if (!isset($_GET['edit'])) {
    ?>
    <form action="simpan.php" method="post">
        <fieldset>
            <legend>Daftar Peralatan</legend>
            <table>
                <tr>
                    <td>Jenis Peralatan</td>
                    <td><input type="text" name="jenisperalatan" required minlength="2"></td>
                </tr>
                <tr>
                    <td>Jenama</td>
                    <td><input type="text" name="jenama" required minlength="2"></td>
                </tr>
                <tr>
                    <td>No. Siri</td>
                    <td><input type="text" name="nosiri" required minlength="2"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit">SIMPAN</button>
                        <button type="reset">BATAL</button>
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>
    <?php
} else {
    $idperalatan = $_GET['edit'];
    $sql = "SELECT * FROM peralatan WHERE idperalatan = $idperalatan";
    $result = $conn->query($sql);
    $row = $result->fetch_object();
    ?>
    <form action="kemaskini.php" method="post">
        <input type="hidden" name="idperalatan" value="<?php echo $row->idperalatan; ?>">
        <fieldset>
            <legend>Kemaskini Data Peralatan</legend>
            <table>
                <tr>
                    <td>Jenis Peralatan</td>
                    <td><input type="text" name="jenisperalatan" required value="<?php echo $row->jenisperalatan; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Jenama</td>
                    <td><input type="text" name="jenama" required value="<?php echo $row->jenama; ?>"></td>
                </tr>
                <tr>
                    <td>No. siri</td>
                    <td><input type="text" name="nosiri" required value="<?php echo $row->nosiri; ?>"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit">SIMPAN</button>
                        <button type="reset">BATAL</button>
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>
    <?php
}
?>
<table class="table">
    <tr>
        <th>Bil</th>
        <th>Jenis Peralatan</th>
        <th>No. Siri</th>
        <th>Jenama</th>
        <th>Tindakan</th>
    </tr>

    <?php
    $bil = 1;
    $sql = "SELECT * FROM peralatan WHERE pelajar = $idpelajar ORDER BY nosiri ASC";
    $result = $conn->query($sql);
    while ($row = $result->fetch_object()) {
        ?>
        <tr>
            <td><?php echo $bil++; ?></td>
            <td><?php echo $row->jenisperalatan; ?></td>
            <td><?php echo $row->nosiri; ?></td>
            <td><?php echo $row->jenama; ?></td>
            <td>
                <a href="index.php?menu=senarai_peralatan&edit=<?php echo $row->idperalatan; ?>">Edit</a>
                |
                <a href="padam.php?idperalatan=<?php echo $row->idperalatan; ?>" onclick="return sahkan()">Padam</a>
            </td>
        </tr>
        <?php
    }
    ?>
</table>
<script>
    function sahkan() {
        return confirm('Adakah anda pasti?');
    }
</script>