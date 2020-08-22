<?php
session_start();

if ( !isset($_SESSION["login"]) ) {
    header("Location: login.php ");
    exit;
}
 
require "functions.php";

// cek apakah tombol submit sudah ditekan atau belum
if ( isset($_POST["submit"]) ) {

    // cek apakah data berhasil di tambahkan atau tidak
    if ( tambah($_POST) > 0 ) {
        echo "
            <script>
                alert('Data berhasil ditambahkan');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal ditambahkan');
                document.location.href = 'index.php';
            </script>
        ";
    }

}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah data anime</title>
</head>
<body>
    <h1>Tambah data anime</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label>
                    NOA :
                    <input type="text" name="noa" require>
                </label>
            </li>
            <li>
                <label>
                    Judul :
                    <input type="text" name="judul" require_once>
                </label>
            </li>
            <li>    
                <label>
                    Studio :
                    <input type="text" name="studio">
                </label>
            </li>
            <li>
                <label>
                    TotalEps :
                    <input type="text" name="total_eps">
                </label>
            </li>
            <li>
                <label>
                    Gambar :
                    <input type="file" name="gambar">
                </label>
            </li>
            <li>
                <button type="submit" name="submit">Tambah Data!</button>
            </li>
        
        
        </ul>
    
    
    </form>





</body>
</html>