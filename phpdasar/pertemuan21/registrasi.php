<?php
session_start();

if ( !isset($_SESSION["login"]) ) {
    header("Location: login.php ");
    exit;
}

require "functions.php";


if ( isset($_POST['register']) ){

    if ( register($_POST) > 0 ){
        ?>
            <script>
                alert('user  baru berhasil ditambahkan!');
            </script>
        <?php
    } else {
        echo mysqli_error($conn);
    }

}


?>


<!DOCTYPE html>
<html>
<head>
    <title>Registrasi</title>
    <style>
        label{
            display: block;
        }
    </style>
</head>
<body>

<h1>Daftar/Registrasi</h1>
<form action="" method="POST">
        <ul>
            <li>
                <label>
                    username : <br>
                    <input type="text" name="username">
                </label>
            </li>
            <li>
                <label>
                    password : <br>
                    <input type="password" name="password">
                </label>
            </li>
            <li>
                <label>
                    Konfirmasi Password : <br> 
                    <input type="password" name="password2">
                </label>
            </li>
            <li>
                <button type="submit" name="register">Register!</button>
            </li>
        </ul>

</form>


</body>
</html>