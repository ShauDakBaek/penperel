<?php
require 'include/conn.php';

$idpengguna = $_POST['idpengguna'];
$katalaluan = $_POST['katalaluan'];

if ($idpengguna == 'admin') {
    $sql = 'SELECT * FROM admin';
    $row = $conn->query($sql)->fetch_object();
    if (password_verify($katalaluan, $row ->kata)){
        $_SESSION['idpengguna']='admin';
        header('location: admin/');
    } else {
        ?>
        <script>
            alert('Maaf, kata laluan salah.');
            window.location = './';
        </script>
        <?php
    }
}else{
    $sql = "SELECT idwarden,nokpwarden, kata FROM warden WHERE nokpwarden = '$idpengguna'";
    $result = $conn->query($sql);
    if($result->num_rows==1){
        $row = $result->fetch_object();
        if (password_verify($katalaluan, $row->kata)){
            $_SESSION['idwarden'] = $row->idwarden;
            header('location: warden/');
        }else{
            ?>
            <script>
                alert('Maaf, kata laluan salah.');
                window.location='./';
            </script>
            <?php
        }
    } else {
        $sql = "SELECT idcustomer, katalaluan FROM customer WHERE nric = '$idpengguna'";
        $result = $conn->query($sql);
        if ($result->num_rows==1){
            $row = $result->fetch_object();
            if(password_verify($katalaluan, $row->katalaluan)) {
                $_SESSION['idcustomer'] = $row->idcustomer;
                header('location: customer/');
            }else{
                ?>
                <script>
                    alert('Maaf, kata laluan salah.');
                    window.location = './';
                </script>
                <?php
            }
        } else {
            ?>
            <script>
                alert('Maaf, ID pengguna/kata laluan salah.');
                window.location = './';
            </script>
            <?php
        }
    }
}