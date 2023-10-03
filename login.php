<?php
require 'include/conn.php';

$idpengguna = $_POST['idpengguna'];
$katalaluan = $_POST['katalaluan'];

if ($idpengguna == 'admin') {
    $sql = 'SELECT * FROM admin';
    $row = $conn->query($sql)->fetch_object();
    if (password_verify($katalaluan, $row->kata)) {
        $_SESSION['idpengguna'] = 'admin';
        header('location: admin/');
    } else {
        $_SESSION['login'] = 'yo';
        // Redirect back to the login page
        header('location: ./');
        exit;
    }
} else {
    $sql = "SELECT idwarden,nokpwarden, kata FROM warden WHERE nokpwarden = '$idpengguna'";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        $row = $result->fetch_object();
        if (password_verify($katalaluan, $row->kata)) {
            $_SESSION['idwarden'] = $row->idwarden;
            header('location: warden/');
        } else {
            ?>
            <script>
                alert('Maaf, kata laluan salah.');
                window.location = './';
            </script>
            <?php
        }
    } else {
        $sql = "SELECT idpelajar,nokppelajar, kata FROM pelajar WHERE nokppelajar = '$idpengguna'";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            $row = $result->fetch_object();
            if (password_verify($katalaluan, $row->kata)) {
                $_SESSION['idpelajar'] = $row->idpelajar;
                header('location: pelajar/');
            } else {
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