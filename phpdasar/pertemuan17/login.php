<?php
session_start();
require "functions.php";

// cek cookie
if ( isset($_COOKIE['on']) && isset($_COOKIE['uu']) ){
    $on = $_COOKIE['on'];
    $uu = $_COOKIE['uu'];

    // ambil berdasarkan id
    $result = mysqli_query($conn, "SELECT username FROM users WHERE
        id = $on");
    $row = mysqli_fetch_assoc($result);

    // cek cookie sama username
    if ( $uu === hash('sha256', $row['username']) ) {
        $_SESSION['login'] = true; 
    }

}


if ( isset ($_SESSION["login"]) ) {
    header("Location: index.php");
    exit;
}


    if ( isset($_POST["login"]) ) {

        $username = $_POST["username"];
        $password = $_POST["password"];

        $result = mysqli_query($conn,"SELECT * FROM users WHERE username = '$username'");

        // cek username
        if ( mysqli_num_rows($result) === 1 ) {

            // cek password
            $row = mysqli_fetch_assoc($result);
           if ( password_verify($password, $row["password"]) ) {
                // set session
                $_SESSION["login"] = true;

                // cek remember me
                if ( isset($_POST['remember']) ) {
                    // buat coockie
                    setcookie('on', $row['id'], time() + 60);
                    setcookie('uu', hash('sha256', $row['username']),
                        time()+60 );
                }

                header("Location: index.php");
                exit;
           }

        } 

        $error = true;
        
    }

?>


<!DOCTYPE html>
<html>
<head>
    <title>Halaman Login</title>
    <style>
        p { color: red; font-style: italic; }
    </style>
</head>
<body>
    
<h1>Halaman Login</h1>

<?php if ( isset($error) ) : ?>
    <p>Username / Passoword salah</p>
<?php endif; ?>

<form action="" method="POST">

    <ul>
        <li>
            <label>
                username :
                <input type="text" name="username">
            </label>
        </li>
        <li>
            <label>
                password :
                <input type="password" name="password">
            </label>
        </li>
        <li>
            <label>
                <input type="checkbox" name="remember">
                Remember Me
            </label>
        </li>
        <li>
            <button type="submit" name="login">Login</button>
        </li>
    </ul>


</form>

</body>
</html>