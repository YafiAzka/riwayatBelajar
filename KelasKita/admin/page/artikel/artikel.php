<?php 

$artikel = query("SELECT *FROM artikel");


?>

<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Table Artikel
            </div>
            <a href="?page=artikel&aksi=tambah" class="btn btn-primary" style="margin-left: 9px; margin-top: 9px">Tambah artikel</a>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Thumbnail</th>
                                <th>Judul</th>
                                <th>Konten</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i=1; foreach($artikel as $arti): ?>
                            <tr class="odd gradeX">
                                <td><?= $i; ?></td>
                                <td><img src="../admin/upload/img/<?= $arti['thumbnail']; ?>" width="100" alt=""></td>
                                <td><?= $arti['judul']; ?></td>
                                <td><?= $arti['konten']; ?></td>
                                <td class="center"><?= $arti['tanggal']; ?></td>
                                <td>
                                    <a href="?page=artikel&aksi=ubah&id=<?= $arti['id']; ?>" class="btn btn-warning"><i class="fa fa-pencil" ></i></a>
                                    <a href="?page=artikel&aksi=hapus&id=<?= $arti['id']; ?>" onclick="return confirm('Yakin mau hapus');"  class="btn btn-danger"> <i class="fa fa-trash" ></i></a>
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