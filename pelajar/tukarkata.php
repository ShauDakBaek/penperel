<?php
require '../include/conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['katalama']) && isset($_POST['katabaru']) && isset($_POST['ulangkatabaru'])) {
        $katalama = $_POST['katalama'];
        $katabaru = $_POST['katabaru'];
        $ulangkatabaru = $_POST['ulangkatabaru'];

        if ($katabaru !== $ulangkatabaru) {
            ?>
            <script>
                alert('Katalaluan baru dan ulang katalaluan baru tidak sepadan. Sila cuba lagi.');
                window.location = 'index.php?menu=profile';
            </script>
            <?php
            exit; // Stop further processing
        }

        $idpelajar = $_SESSION['idpelajar'];

        $sql = "SELECT kata FROM pelajar WHERE idpelajar = $idpelajar";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_object();
            $currentPassword = $row->kata;

            if (password_verify($katalama, $currentPassword)) {

                $hashed = password_hash($katabaru, PASSWORD_BCRYPT);

                $updatePass = "UPDATE pelajar SET kata = '$hashed' WHERE idpelajar = $idpelajar";
                if ($conn->query($updatePass)) {
                    ?>
                    <script>
                        alert('Katalaluan berjaya dikemaskini. Sila log masuk semula.');
                        window.location = '../logout.php';
                    </script>
                    <?php
                } else {
                    ?>
                    <script>
                        alert('Kemaskini katalaluan gagal. Sila cuba lagi.');
                        window.location = 'index.php?menu=profile';
                    </script>
                    <?php
                }
            } else {
                ?>
                <script>
                    alert('Maaf. Katalaluan lama salah. Sila cuba lagi.');
                    window.location = 'index.php?menu=profile';
                </script>
                <?php
            }
        } else {
            ?>
            <script>
                alert('Pelajar not found. Please try again.');
                window.location = 'index.php?menu=profile';
            </script>
            <?php
        }
    } else {
        ?>
        <script>
            alert('Invalid POST data.');
            window.location = 'index.php?menu=profile';
        </script>
        <?php
    }
}
?>
