<?php 

$id = $_GET['id'];

$admin = query("SELECT * FROM admin WHERE id=$id")[0];

if(isset($_POST['submit'])) {

    if(ubahAdmin($_POST) > 0) {
        echo "
            <script>
                alert('Data berhasil diubah');
                document.location.href = '?page=admin';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal diubah');
                document.location.href = '?page=admin';
            </script>
        ";
    }

}



?>



<div class="panel panel-default">
    <div class="panel-heading">
        Ubah data Admin
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">

                <form method="POST" action="">
                <input type="hidden" name="id" value="<?= $admin["id"]; ?>">

                    <div class="form-group">
                        <label>Nama</label>
                        <input class="form-control" value="<?= $admin['nama']; ?>" name="nama" />

                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" value="<?= $admin['email']; ?>" name="email" type="text" />

                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" value="<?= $admin['password']; ?>" name="password" type="text" />

                    </div>
                    
                    <div class="form-group">
                        <label>No Hp</label>
                        <input class="form-control" value="<?= $admin['no_hp']; ?>" name="no_hp" type="number" />

                    </div>


                    <div class="form-group">
                        <button class="btn btn-primary" name="submit" type="submit">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>