<?php 
// koneksi ke databases
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

// ambil dari table top_anime
$result = mysqli_query($conn, "SELECT *FROM top_anime");

// ambil data (fetch) dari to_anime dari object result
// mysqli_fetch_row() // mengembalikan assay numerik
// mysqli_fetch_assoc() // mengembalikan array associative
// mysqli_fetch_array() // mengembalikan keduanya
// mysqli_fetch_object() // 

// while($ani = mysqli_fetch_assoc($result) ) {
//     var_dump($ani);
// }  



?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

<h1>Daftar Anime</h1>

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
    <?php while( $row = mysqli_fetch_assoc($result) ) : ?>
    <tr>
        <td><?= $i; ?></td>
        <td>
            <a href="">ubah</a> |
            <a href="">hapus</a>
        </td>
        <td><img src="img/<?= $row["gambar"]; ?>" width="50" alt=""></td>
        <td><?= $row["noa"]; ?></td>
        <td><?= $row["judul"]; ?></td>
        <td><?= $row["studio"]; ?></td>
        <td><?= $row["total_eps"]; ?></td>
    </tr>
    <?php $i++; ?>
<?php endwhile; ?>

</table>



</body>
</html>