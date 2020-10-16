<?php 

if(isset($_POST['submit'])) {

    if(tambahArtikel($_POST) > 0) {
        echo "
            <script>
                alert('Data berhasil ditambahkan');
                document.location.href = '?page=artikel';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal ditambahkan');
                document.location.href = '?page=artikel';
            </script>
        ";
    }

}



?>



<div class="panel panel-default">
    <div class="panel-heading">
        Tambah Artikel
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">

                <form method="POST" action="" enctype="multipart/form-data">

                     <div class="form-group">
                        <label>Gambar</label>
                        <input class="form-control" type="file" name="gambar" />

                    </div>

                     <div class="form-group">
                        <label>Judul</label>
                        <input class="form-control" name="judul" type="text" />

                    </div>

                    <div class="form-group">
                        <label>konten</label>
                        <input class="form-control" name="konten" type="text" />

                    </div>


                    <div class="form-group">
                        <button class="btn btn-primary" name="submit" type="submit">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>