<?php 
require "functions.php";

    if ( isset($_POST["login"]) ) {

        $username = $_POST["username"];
        $password = $_POST["password"];

        $result = mysqli_query($conn,"SELECT * FROM users WHERE username = '$username'");

        // cek username
        if ( mysqli_num_rows($result) === 1 ) {

            // cek password
            $row = mysqli_fetch_assoc($result);
           if ( password_verify($password, $row["password"]) ) {
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
            <button type="submit" name="login">Login</button>
        </li>
    </ul>


</form>

</body>
</html>