<?php 

if(isset($_POST['submit'])) {

    if(tambahAdmin($_POST) > 0) {
        echo "
            <script>
                alert('Data berhasil ditambahkan');
                document.location.href = '?page=admin';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal ditambahkan');
                document.location.href = '?page=admin';
            </script>
        ";
    }

}



?>



<div class="panel panel-default">
    <div class="panel-heading">
        Tambah data Admin
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">

                <form method="POST" action="">


                    <div class="form-group">
                        <label>Nama</label>
                        <input class="form-control" name="nama" />

                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="email" />

                    </div>

                    <div class="form-group">
                        <label>password</label>
                        <input class="form-control" name="password" type="password" />

                    </div>

                    <div class="form-group">
                        <label>No Hp</label>
                        <input class="form-control" name="no_hp" type="number" />

                    </div>



                    <div class="form-group">
                        <button class="btn btn-primary" name="submit" type="submit">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>