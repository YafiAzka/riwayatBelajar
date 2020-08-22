<?php 
require "functions.php";

// ambil data di URL
$id = $_GET["id"]; 

// query data top_anime berdasarkan id
$top_ani = query("SELECT * FROM top_anime WHERE id = $id")[0];


// cek apakah tombol submit sudah ditekan atau belum
if ( isset($_POST["submit"]) ) {

    // cek apakah data berhasil di ubah atau tidak
    if ( ubah($_POST) > 0 ) {
        echo "
            <script>
                alert('Data berhasil diubah');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal diubah');
                document.location.href = 'index.php';
            </script>
        ";
    }

}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Ubah data anime</title>
</head>
<body>
    <h1>Ubah data anime</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $top_ani["id"]; ?>">
        <input type="hidden" name="gambarlama" value="<?= $top_ani["gambar"]; ?>">
        <ul>
            <li>
                <label>
                    NOA :
                    <input type="text" name="noa" value="<?= $top_ani["noa"];?>" >
                </label>
            </li>
            <li>
                <label>
                    Judul :
                    <input type="text" name="judul" value="<?= $top_ani["judul"];?>" >
                </label>
            </li>
            <li>
                <label>
                    Studio :
                    <input type="text" name="studio" value="<?= $top_ani["studio"];?>" >
                </label>
            </li>
            <li>
                <label>
                    TotalEps :
                    <input type="text" name="total_eps" value="<?= $top_ani["total_eps"];?>" >
                </label>
            </li>
            <li>
                <label>
                    Gambar : <br>
                    <img src="img/<?= $top_ani['gambar']; ?>" width="100px"><br>
                    <input type="file" name="gambar">
                </label>
            </li>
            <li>
                <button type="submit" name="submit">Ubah Data!</button>
            </li>
        
        
        </ul>
    
    
    </form>





</body>
</html>