<?php
session_start();
require 'config/functions.php';

//cookie
if( isset($_COOKIE['on']) && isset($_COOKIE['em']) ) {
    $on = $_COOKIE['on'];
    $em = $_COOKIE['em'];

    $result = mysqli_query($conn, "SELECT * FROM admin WHERE id='$on'");
    $row = mysqli_fetch_assoc($result);

    if($em === hash('sha256', $row['email'])){
        $_SESSION['login'] = true;
    }
}

// session login
if (isset($_SESSION['login'])) {
    header("Location: admin/dashboard.php");
    exit;
}

if (isset($_POST['login'])) {
    $email = $_POST["email"];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM admin WHERE email='$email' and password='$password'");

    if (mysqli_num_rows($result) === 1) {
        $_SESSION['login'] = true;

        if(isset($_POST['remember'])) {
            setcookie('on', $row['id'], time() + 1000);
            setcookie('em', hash('sha256', $row['email']), time() + 1000);
        }
        
        header("Location: admin/dashboard.php");
        exit;
    }

    $error = true;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- My CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Login</title>
</head>

<body>

    <div class="container">
        <h1 class="text-center text-primary ">Kelas Kita</h1>
        <div class="row justify-content-center">
            <div class="card border-primary mt-3" style="max-width: 18  rem;">
                <div class="card-header">Login for Moderator / Admin </div>

                <div class="card-body text-secondary">
                    <form action="" method="POST">
                        <?php if(isset($error)) : ?>
                            <div class="alert alert-danger" role="alert">
                                Email atau Password salah
                            </div>
                        <?php endif; ?>
                        <div class="input-group flex-nowrap mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">@</span>
                            </div>
                            <input type="text" class="form-control" name="email" placeholder="Email" aria-label="Username" aria-describedby="addon-wrapping" required>
                        </div>

                        <div class="input-group flex-nowrap mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping"><i class="fa fa-lock"></i></span>
                            </div>
                            <input type="password" class="form-control" name="password" placeholder="Password" aria-label="Password" aria-describedby="addon-wrapping" required>
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" name="remember" type="checkbox" value="" id="invalidCheck2">
                                <label class="form-check-label" for="invalidCheck2">
                                    Remember me
                                </label>
                            </div>
                        </div>
                        <button type="submit" name="login" class="btn btn-primary">Login</button>
                        <a href="index.php" class="btn btn-danger float-right">Back</a>
                    </form>


                </div>
            </div>
        </div>
    </div>




</body>

</html>