<?php
require '../include/conn.php';

$idwarden = $_GET['idwarden'];

$sql1 = "SELECT COUNT(*) AS count FROM pelajar WHERE warden = $idwarden";
$result1 = $conn->query($sql1);
$row1 = $result1->fetch_object();

if(!$row1->count == 0){
    ?>
    <script>
        alert('Ralat : Warden mempunyai pelajar yang didaftarkan olehnya.');
        window.location = 'index.php?menu=senarai_warden';
    </script>
<?php
}else{
    $sql = "DELETE FROM warden where idwarden = $idwarden";
    $conn->query($sql);

    header('location:index.php?menu=senarai_warden');
}