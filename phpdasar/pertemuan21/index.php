<?php
session_start();

if ( !isset($_SESSION["login"]) ) {
    header("Location: login.php ");
    exit;
}

require 'functions.php';
$top_ani = query("SELECT * FROM top_anime");

// tombol cari ditekan 
if ( isset($_POST["cari"]) ) {
    $top_ani = cari($_POST["keyword"]);
} 

?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/script.js"></script>
    
    <style>
        .loader{
            width: 200px;
            position: absolute;
            top: 88px;
            left: 170px;   
            display: none;
        }

    </style>
    
</head>
<body>
<a href="logout.php">Logout</a> |  <a href="print.php" target="_blank">PrintToPDF</a>

<h1>Daftar Anime</h1>

<a href="tambah.php">Tambah Data Anime</a>
<br><br>

<form action="" method="POST">
    <input type="text" name="keyword" size="30" autofocus 
    placeholder="masukkan keyword pencarian" autocomplete="off" id="keyword">
    <button type="submit" name="cari" id="tombol-cari">Cari!</button>

    <img src="img/loader.gif" class="loader">

</form>



<br>
<div id="container">
<table border="1" cellpadding="10" cellspacing="0">
    
    <tr>
        <th>No.</th>
        <th>Aksi</th>
        <th>Gambar</th>
        <th>NOA</th>
        <th>Judul</th>
        <th>Studio</th>
        <th>TotalEps</th>
    </tr>

    <?php $i = 1; ?>
<?php foreach( $top_ani as $row ) : ?>
    <tr>
        <td><?= $i; ?></td>
        <td>
            <a href="ubah.php?id=<?= $row["id"]; ?>">ubah</a> |
            <a href="hapus.php?id=<?= $row["id"]; ?>" onclick=" return confirm('anda yakin?');">
                hapus
            </a>
        </td>
        <td><img src="img/<?= $row["gambar"]; ?>" width="50" ></td>
        <td><?= $row["noa"]; ?></td>
        <td><?= $row["judul"]; ?></td>
        <td><?= $row["studio"]; ?></td>
        <td><?= $row["total_eps"]; ?></td>
    </tr>
    <?php $i++; ?>
<?php endforeach; ?>

</table>
</div>

   
</body>
</html>