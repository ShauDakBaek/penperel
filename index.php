<?php
require 'include/conn.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>PenPerEl - Login</title>
    <link rel="stylesheet" href="include/assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="include/assets/css/Login-screen.css">
</head>

<body>
<div id="login-one" class="login-one">
    <form action="login.php" method="post" class="login-one-form">
        <div class="col">
            <div class="login-one-ico"><i class="fa fa-user" id="lockico"></i></div>
            <div class="form-group mb-3">
                <div>
                    <h3 id="heading">PenPerEl</h3>
                </div>
                <input class="form-control" type="text" name="idpengguna" placeholder="ID Pengguna" required>
                <input class="form-control" type="password" name="katalaluan" placeholder="Kata Laluan" required>
                <button class="btn btn-primary loginButton" id="button" type="submit">Log in</button>
            </div>
        </div>
    </form>
</div>

<!-- Modal -->
<div class="modal fade" id="wrongPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Katalaluan Salah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Sila cuba lagi.
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    <?php
    if (isset($_SESSION['login'])){
        unset($_SESSION['login'])
    ?>
    $(document).ready(function () {
        $('#wrongPassword').modal('show');
    });
    setTimeout(function(){
        $('#wrongPassword').modal('hide');
    }, 3000);
    <?php
    }
    ?>
</script>
</body>

</html>