<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelajar</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Senarai Warden</h2>
<?php
if(!isset($_GET['edit'])){
    ?>
    <form action="simpan.php" method="post">
        <fieldset>
            <legend>Daftar Peralatan</legend>
            <table>
                <tr>
                    <td>pelajar</td>
                    <td><input type="text" name="pelajar" required></td>
                </tr>
                <tr>
                    <td>jenis peralatan</td>
                    <td><input type="text" name="jenisperalatan" required minlength="12" maxlength="12"></td>
                </tr>
                <tr>
                    <td>jenama</td>
                    <td><input type="text" name="jenama" required minlength="5" maxlength="10"></td>
                </tr>
                <tr>
                    <td>no siri</td>
                    <td><input type="text" name="nosiri" required minlength="5" maxlength="10"></td>
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
}else{
    $idwarden = $_GET['edit'];
    $sql = "SELECT * FROM warden WHERE idwarden = $idwarden";
    $result = $conn->query($sql);
    $row = $result->fetch_object();
    ?>
    <form action="kemaskini.php" method="post">
        <input type="hidden" name="idwarden" value="<?php echo $row->idwarden; ?>">
        <fieldset>
            <legend>Kemaskini Data Warden</legend>
            <table>
                <tr>
                    <td>Nama Warden</td>
                    <td><input type="text" name="namawarden" required value="<?php echo $row->namawarden; ?>"></td>
                </tr>
                <tr>
                    <td>No. Matrik</td>
                    <td><input type="text" name="nokpwarden" required value="<?php echo $row->nokpwarden; ?>" minlength="12" maxlength="12"></td>
                </tr>
                <tr>
                    <td>Katalaluan</td>
                    <td><input type="text" name="kata" required minlength="5" maxlength="5"></td>
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
        <th>Nama Warden</th>
        <th>No. KP Warden</th>
        <th>Tindakan</th>
    </tr>
    <?php
    $bil = 1;
    $sql = "SELECT * FROM warden ORDER BY namawarden";
    $result = $conn->query($sql);
    while ($row = $result->fetch_object()) {
        ?>
        <tr>
            <td><?php echo $bil++; ?></td>
            <td><?php echo $row->namawarden; ?></td>
            <td><?php echo $row->nokpwarden; ?></td>
            <td>
                <a href="index.php?menu=senarai_warden&edit=<?php echo $row->idwarden; ?>">Edit</a>
                |
                <a href="padam.php?idwarden=<?php echo $row->idwarden; ?>" onclick="return sahkan()">Padam</a>
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