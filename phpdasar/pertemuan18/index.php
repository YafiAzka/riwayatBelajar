<?php
session_start();

if ( !isset($_SESSION["login"]) ) {
    header("Location: login.php ");
    exit;
}

require 'functions.php';

// paginatio
// konfigurasi
$jumlahDataPerhalaman = 4;
$jumlahData = count(query("SELECT * FROM top_anime"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
$halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
$awalData = ( $jumlahDataPerhalaman * $halamanAktif ) - $jumlahDataPerhalaman ;


$top_ani = query("SELECT * FROM top_anime LIMIT $awalData, $jumlahDataPerhalaman");

// tombol cari ditekan 
if ( isset($_POST["cari"]) ) {
    $top_ani = cari($_POST["keyword"]);
} 

?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style> .col{ font-weight: bold; color: red; } </style>
</head>
<body>
<a href="logout.php">Logout</a>

<h1>Daftar Anime</h1>

<a href="tambah.php">Tambah Data Anime</a>
<br><br>

<form action="" method="POST">
    <input type="text" name="keyword" size="30" autofocus 
    placeholder="masukkan keyword pencarian" autocomplete="off">
    <button type="submit" name="cari">Cari!</button>
</form>
<br>

<?php if ( $halamanAktif > 1 ) : ?>
    <a href="?halaman=<?= $halamanAktif - 1; ?>">&laquo;</a>
<?php endif; ?>

<!-- navigasi -->
<?php for($i = 1; $i <= $jumlahHalaman; $i++) :?>
    <?php if( $i == $halamanAktif ) :?>
        <a href="?halaman=<?= $i; ?>" class="col"><?= $i; ?></a>
    <?php else :?>
        <a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
    <?php endif; ?>    
<?php endfor; ?>

<?php if ( $halamanAktif < $jumlahHalaman ) : ?>
    <a href="?halaman=<?= $halamanAktif + 1; ?>">&raquo;</a>
<?php endif; ?>

<br>
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
        <td><img src="img/<?= $row["gambar"]; ?>" width="50" alt=""></td>
        <td><?= $row["noa"]; ?></td>
        <td><?= $row["judul"]; ?></td>
        <td><?= $row["studio"]; ?></td>
        <td><?= $row["total_eps"]; ?></td>
    </tr>
    <?php $i++; ?>
<?php endforeach; ?>

</table>



</body>
</html>