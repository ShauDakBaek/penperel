<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>PenPerEl - Login</title>
    <link rel="stylesheet" href="include/assets/bootstrap/css/bootstrap.min.css">
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
                <input class="form-control" type="text" name="idpengguna" id="input-1" placeholder="ID Pengguna">
                <input class="form-control" type="password" name="katalaluan" id="input-2" placeholder="Kata Laluan">
                <button class="btn btn-primary" id="button" style="background-color: #007ac9;margin-right: 14px;padding-right: 0px;margin-left: 1px;" type="submit">Log in</button>
            </div>
        </div>
    </form>
</div>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>