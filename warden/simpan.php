<?php
require '../include/conn.php';

$namapelajar = $_POST['namapelajar'];
$nokppelajar = $_POST['nokppelajar'];
$katalaluan = $_POST['nokppelajar'];

$hashed = password_hash($katalaluan, PASSWORD_BCRYPT);

$idwarden  = $_SESSION['idwarden'];

$checksql = "SELECT COUNT(*) AS count FROM pelajar WHERE nokppelajar = '$nokppelajar'";
$result = $conn->query($checksql);
$row = $result->fetch_object();

if ($row->count==0){
    $sql = "INSERT INTO pelajar (warden,namapelajar, nokppelajar, kata) VALUES ('$idwarden','$namapelajar', '$nokppelajar', '$hashed')";
    $conn->query($sql);
    header('location: index.php?menu=senarai_pelajar');
} else {
    ?>
    <script>
        alert('NoKP Pelajar teleh wujud.');
        window.location = 'index.php?menu=senarai_pelajar';
    </script>
    <?php
}
