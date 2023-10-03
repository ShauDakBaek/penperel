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
                alert('Katalaluan baru dan pengesahan tidak sepadan. Sila cuba lagi.');
                window.location = 'index.php?menu=profile';
            </script>
            <?php
            exit; // Exit the script if passwords don't match
        }

        $wardenId = $_SESSION['idwarden'];

        $sql = "SELECT kata FROM warden WHERE idwarden = $wardenId";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_object();
            $currentPassword = $row->kata;

            if (password_verify($katalama, $currentPassword)) {

                $hashed = password_hash($katabaru, PASSWORD_BCRYPT);

                $updatePass = "UPDATE warden SET kata = '$hashed' WHERE idwarden = $wardenId";
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
                alert('Warden not found. Please try again.');
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
