<?php 
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
</head>
<body>

<h1>Daftar Anime</h1>

<a href="tambah.php">Tambah Data Anime</a>
<br><br>

<form action="" method="POST">
    <input type="text" name="keyword" size="30" autofocus 
    placeholder="masukkan keyword pencarian" autocomplete="off">
    <button type="submit" name="cari">Cari!</button>
</form>

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