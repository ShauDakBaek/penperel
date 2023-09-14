<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h1>Selamat datang, Warden!</h1>
<br>

<?php
$sql = "SELECT COUNT(*) AS count FROM `pelajar`";
$result = $conn->query($sql);
$row = $result->fetch_object();

$sql2 = "SELECT COUNT(*) AS count FROM `warden`";
$result2 = $conn->query($sql2);
$row2 = $result2->fetch_object();

$sql3 = "SELECT COUNT(*) AS count FROM `peralatan`";
$result3 = $conn->query($sql3);
$row3 = $result3->fetch_object();
?>

<h3>Jumlah Warden : <?php echo $row2->count; ?></h3>
<h3>Jumlah Pelajar : <?php echo $row->count; ?></h3>
<h3>Jumlah Peralatan : <?php echo $row3->count; ?></h3>
</body>
</html>