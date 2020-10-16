<?php

$id = $_GET['id'];

$artikel = query("SELECT * FROM artikel WHERE id='$id'")[0];

if(isset($_POST['submit'])) {

    if(ubahArtikel($_POST) > 0) {
        echo "
            <script>
                alert('Data berhasil diubah');
                document.location.href = '?page=artikel';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal diubah');
                document.location.href = '?page=artikel';
            </script>
        ";
    }

}



?>



<div class="panel panel-default">
    <div class="panel-heading">
        Ubah Artikel
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">

                <form method="POST" action="" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $artikel['id']; ?>">
                    <input type="hidden" name="thumbnail" value="<?= $artikel['thumbnail']; ?>">

                     <div class="form-group">
                        <label>Gambar</label>
                        <img src="../admin/upload/img/<?= $artikel['thumbnail']; ?>" width="100px" alt="">
                        <input class="form-control" type="file" name="gambar" />

                    </div>

                     <div class="form-group">
                        <label>Judul</label>
                        <input class="form-control" value="<?= $artikel['judul']; ?>" name="judul" type="text" />

                    </div>

                    <div class="form-group">
                        <label>konten</label>
                        <input class="form-control" value="<?= $artikel['konten']; ?>" name="konten" type="text" />

                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary" name="submit" type="submit">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>