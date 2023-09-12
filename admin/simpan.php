<?php
require '../include/conn.php';

$namawarden = $_POST['namawarden'];
$nokpwarden = $_POST['nokpwarden'];
$katalaluan = $_POST['katalaluan'];

$hashed = password_hash("$katalaluan", PASSWORD_BCRYPT);

$sql = "INSERT INTO warden VALUES(null, '$namawarden', '$nokpwarden', '$hashed')";
$conn->query($sql);

header('location: index.php?menu=senarai_warden');