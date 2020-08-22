<?php 
require '../functions.php';
usleep(500000);
$keyword = $_GET['keyword'];
$query = "SELECT * FROM top_anime
        WHERE
        judul LIKE '%$keyword%' OR
        noa LIKE '%$keyword%' OR
        studio LIKE '%$keyword%' OR
        total_eps LIKE '%$keyword%' 
    ";
$top_ani = query($query);

?>

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