<?php
require '../include/conn.php';

$namawarden = $_POST['namawarden'];
$nokpwarden = $_POST['nokpwarden'];
$katalaluan = $_POST['nokpwarden'];

$hashed = password_hash("$katalaluan", PASSWORD_BCRYPT);

$checksql1 = "SELECT COUNT(*) AS count FROM warden WHERE nokpwarden = '$nokpwarden'";
$result = $conn->query($checksql1);
$row = $result->fetch_object();

$checksql2 = "SELECT * FROM pelajar WHERE nokppelajar = '$nokpwarden'";
$result1 = $conn->query($checksql2);

if ($row->count == 0 && $row1 = $result1->num_rows == 0) {
    $sql = "INSERT INTO warden VALUES(null, '$namawarden', '$nokpwarden', '$hashed')";
    $conn->query($sql);
    header('location: index.php?menu=senarai_warden');
} else {
    ?>
    <script>
        alert('NoKP teleh wujud.');
        window.location = 'index.php?menu=senarai_warden';
    </script>
    <?php
}