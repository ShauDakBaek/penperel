<!DOCTYPE html>
<html>
<head>
    <title>Senarai Pelajar</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<h1>Senarai Pelajar</h1>

<?php

$idwarden = $_SESSION['idwarden'];

if (!isset($_GET['edit'])) {
    ?>
    <form action="simpan.php" method="post">
        <fieldset>
            <legend>Daftar Pelajar Baru</legend>
            <table>
                <tr>
                    <td>Nama Pelajar</td>
                    <td><input type="text" name="namapelajar" required></td>
                </tr>
                <tr>
                    <td>No.KP Pelajar</td>
                    <td><input type="text" name="nokppelajar" minlength="12" maxlength="12" required></td>
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
    $idpelajar = $_GET['edit'];
    $sql = "SELECT * FROM pelajar WHERE idpelajar = $idpelajar";
    $result = $conn->query($sql);
    $row = $result->fetch_object();
    ?>
    <form action="kemaskini.php" method="post">
        <input type="hidden" name="idpelajar" value="<?php echo $row->idpelajar; ?>">
        <fieldset>
            <legend>Kemaskini Data Pelajar</legend>
            <table>
                <tr>
                    <td>Nama Pelajar</td>
                    <td><input type="text" name="namapelajar" required value="<?php echo $row->namapelajar; ?>"></td>
                </tr>
                <tr>
                    <td>No. Matrik</td>
                    <td><input type="text" name="nokppelajar" required value="<?php echo $row->nokppelajar; ?>"
                               minlength="12" maxlength="12"></td>
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
        <th>Nama Pelajar</th>
        <th>No. KP Pelajar</th>
        <th>Tindakan</th>
    </tr>
    <?php
    $bil = 1;
    $idwarden = $_SESSION['idwarden'];
    $sql = "SELECT * FROM pelajar WHERE warden = $idwarden ORDER BY namapelajar";
    $result = $conn->query($sql);
    while ($row = $result->fetch_object()) {
        ?>
        <tr>
            <td><?php echo $bil++; ?></td>
            <td><?php echo $row->namapelajar; ?></td>
            <td><?php echo $row->nokppelajar; ?></td>
            <td>
                <a href="index.php?menu=senarai_pelajar&edit=<?php echo $row->idpelajar; ?>">Edit</a>
                |
                <a href="padam.php?idpelajar=<?php echo $row->idpelajar; ?>" onclick="return sahkan()">Padam</a>
                |
                <a href="reset.php?idpelajar=<?php echo $row->idpelajar; ?>" onclick="return sahkan()">Reset</a>
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
</body>
</html>