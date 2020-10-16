<?php 

if(isset($_POST['submit'])) {

    if(tambahSiswa($_POST) > 0) {
        echo "
            <script>
                alert('Data berhasil ditambahkan');
                document.location.href = '?page=siswa';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal ditambahkan');
                document.location.href = '?page=siswa';
            </script>
        ";
    }

}



?>



<div class="panel panel-default">
    <div class="panel-heading">
        Tambah Data siswa
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">

                <form method="POST" action="" enctype="multipart/form-data">

                     <div class="form-group">
                        <label>gambar</label>
                        <input class="form-control" type="file" name="gambar" />

                    </div>

                     <div class="form-group">
                        <label>Nis</label>
                        <input class="form-control" name="nis" type="number" />

                    </div>

                    <div class="form-group">
                        <label>Nama</label>
                        <input class="form-control" name="nama" />

                    </div>

                    <div class="form-group">
                        <label>Bio</label>
                        <input class="form-control" name="bio" type="text" />

                    </div>

                    <div class="form-group">
                        <label>Tempat tinggal</label>
                        <input class="form-control" name="tempat_tinggal" type="text" />

                    </div>
                    
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <input class="form-control" name="jenis_kelamin" type="text" />

                    </div>


                    <div class="form-group">
                        <button class="btn btn-primary" name="submit" type="submit">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>