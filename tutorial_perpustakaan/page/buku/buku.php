 <a href="?page=buku&aksi=tambah" class="btn btn-success" style="margin: 7px">Tambah Buku</a>
 <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             Data Buku
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nomor</th>
                                            <th>Judul</th>
                                            <th>Pengarang</th>
                                            <th>Penerbit</th>
                                            <th>Tanun Terbit</th>
                                            <th>ISBN</th>
                                            <th>Jumlah Buku</th>
                                            <th>Lokasi</th>
                                            <th>Tanggal</th>
                                            <th>Aksi</th>
                                        </tr>
                                        
                                    </thead>
                                    <tbody>

                                    <?php 
                                    $no = 1;
                                    $sql = $koneksi->query ("select *from tb_buku");

                                    while ($data= $sql->fetch_assoc()) {

                                    

                                    ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $data['judul'];?></td>
                                    <td><?php echo $data['pengarang'];?></td>
                                    <td><?php echo $data['penerbit'];?></td>
                                    <td><?php echo $data['tahun_terbit'];?></td>
                                    <td><?php echo $data['isbn'];?></td>
                                    <td><?php echo $data['jumlah_buku'];?></td>
                                    <td><?php echo $data['lokasi'];?></td>
                                    <td><?php echo $data['tgl_input'];?></td>
                                    <td>
                                        
                                        <a href="?page=buku&aksi=ubah&id=<?php echo $data['id']; ?>" class="btn btn-info">
                                            <i class="fa fa-pencil"></i> Ubah</a>
                                        <a onclick="return confirm('Are You Sure ')" href="?page=buku&aksi=hapus&id=<?php echo $data['id']; ?>" class="btn btn-danger">Hapus</a>

                                    </td>
                                </tr>
                                <?php } ?>  
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
