<?php 

$admin = query("SELECT id, nama, email, no_hp FROM admin");

?>


<div class="row">
    <div class="col-md-12">
        <!--   Basic Table  -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Admin
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No hp</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1; foreach($admin as $adm): ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $adm['nama']; ?></td>
                                <td><?= $adm['email']; ?></td>
                                <td><?= $adm['no_hp']; ?></td>
                                <td>
                                    <a href="?page=admin&aksi=ubah&id=<?= $adm['id']; ?>" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                    <a onclick="return confirm('Kamu yakin ')" href="?page=admin&aksi=hapus&id=<?= $adm['id']; ?>"  class="btn btn-danger"> <i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php $i++ ?>    
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <a href="?page=admin&aksi=tambah" class="btn btn-primary" style="margin-top: 9px">Tambah admin</a>
            </div>
        </div>
        <!-- End  Basic Table  -->
    </div>
</div>