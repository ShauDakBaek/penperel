<?php

require '../include/conn.php';
$katalama = $_POST['katalama'];
$katabaru = $_POST['katabaru'];

$sql = 'SELECT kata FROM admin';
$result = $conn->query($sql);
if($result->num_rows==1){
    $row = $result->fetch_object();
    if(password_verify($katalama, $row->kata)) {
        $hashed = password_hash($katabaru, PASSWORD_BCRYPT);
        $updatePass = "UPDATE admin SET kata = '$hashed'";
        $conn->query($updatePass);
        ?>
        <script>
            alert('Katalaluan berjaya dikemaskini. Sila log masuk semula.');
            window.location = '../include/logout.php';
        </script>
        <?php
    }else{
        ?>
        <script>
            alert('Maaf. Katalaluan lama salah. Sila cuba lagi.')
            window.location = 'index.php?menu=profile';
        </script>
        <?php
    }

}