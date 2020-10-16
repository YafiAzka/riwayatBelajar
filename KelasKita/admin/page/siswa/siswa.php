<?php

    $siswa = query("SELECT *FROM siswa");

?>
<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Table Siswa
            </div>
            <a href="?page=siswa&aksi=tambah" class="btn btn-primary" style="margin-left: 9px; margin-top: 9px">Tambah Siswa</a>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Thumbnail</th>
                                <th>Nis</th>
                                <th>Nama</th>
                                <th>Bio</th>
                                <th>Tempat tinggal</th>
                                <th>Jenis Kelamin</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i=1; foreach($siswa as $sis): ?>
                            <tr class="odd gradeX">
                                <td><?= $i; ?></td>
                                <td>
                                    <img src="../admin/upload/img/<?= $sis['thumbnail']; ?>" width="100px" alt="">
                                </td>
                                <td><?= $sis['nis']; ?></td>
                                <td><?= $sis['nama']; ?></td>
                                <td><?= $sis['bio']; ?></td>
                                <td><?= $sis['tempat_tinggal']; ?></td>
                                <td class="center"><?= $sis['jenis_kelamin']; ?></td>
                                <td>
                                    <a href="?page=siswa&aksi=ubah&id=<?= $sis['id']; ?>" class="btn btn-warning"><i class="fa fa-pencil" ></i></a>
                                    <a onclick="return confirm('Kamu yakin ')" href="?page=siswa&aksi=hapus&id=<?= $sis['id']; ?>"  class="btn btn-danger"> <i class="fa fa-trash" ></i></a>
                                </td>
                            </tr>
                        <?php $i++ ?>
                        <?php endforeach; ?>    
                            
                            
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <!--End Advanced Tables -->
    </div>
</div>