<?php
require '../include/conn.php';

$namawarden = $_POST['namawarden'];
$nokpwarden = $_POST['nokpwarden'];
$katalaluan = $_POST['nokpwarden'];

$hashed = password_hash("$katalaluan", PASSWORD_BCRYPT);

$checksql = "SELECT COUNT(*) AS count FROM warden WHERE nokpwarden = '$nokpwarden'";
$result = $conn->query($checksql);
$row = $result->fetch_object();

if ($row->count==0){
    $sql = "INSERT INTO warden VALUES(null, '$namawarden', '$nokpwarden', '$hashed')";
    $conn->query($sql);
    header('location: index.php?menu=senarai_warden');
} else {
    ?>
    <script>
        alert('NoKP Warden teleh wujud.');
        window.location = 'index.php?menu=senarai_warden';
    </script>
    <?php
}