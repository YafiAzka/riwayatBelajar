<?php 

$id = $_GET['id'];

$siswa = query("SELECT *FROM siswa WHERE id=$id")[0];

if(isset($_POST['submit'])) {

    if(ubahSiswa($_POST) > 0) {
        echo "
            <script>
                alert('Data berhasil diubah');
                document.location.href = '?page=siswa';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal diubah');
                document.location.href = '?page=siswa';
            </script>
        ";
    }

}



?>



<div class="panel panel-default">
    <div class="panel-heading">
        Ubah data siswa
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">

                <form method="POST" action="" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $siswa["id"]; ?>">
                <input type="hidden" name="thumbnail" value="<?= $siswa["thumbnail"]; ?>">

                     <div class="form-group">
                        <label>Gambar</label>
                        <img src="../admin/upload/img/<?= $siswa['thumbnail']; ?>" width="100px" alt="">
                        <input class="form-control" type="file" name="gambar" />

                    </div>

                     <div class="form-group">
                        <label>Nis</label>
                        <input class="form-control" value="<?= $siswa['nis']; ?>" name="nis" type="number" />

                    </div>

                    <div class="form-group">
                        <label>Nama</label>
                        <input class="form-control" value="<?= $siswa['nama']; ?>" name="nama" />

                    </div>

                    <div class="form-group">
                        <label>Bio</label>
                        <input class="form-control" value="<?= $siswa['bio']; ?>" name="bio" type="text" />

                    </div>

                    <div class="form-group">
                        <label>Tempat tinggal</label>
                        <input class="form-control" value="<?= $siswa['tempat_tinggal']; ?>" name="tempat_tinggal" type="text" />

                    </div>
                    
                    <div class="form-group">
                        <label>Jenis kelamin</label>
                        <input class="form-control" value="<?= $siswa['jenis_kelamin']; ?>" name="jenis_kelamin" type="text" />

                    </div>


                    <div class="form-group">
                        <button class="btn btn-primary" name="submit" type="submit">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>