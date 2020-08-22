<?php 
    $nim = $_GET['nim'];

    $sql = $koneksi ->query("select *from tb_anggota where nim='$nim'");
    $tampil = $sql-> fetch_assoc();
    $jenis_kelamin = $tampil['jenis_kelamin'];
    $prodi = $tampil['prodi']
 ?>


<div class="panel panel-default">
                        <div class="panel-heading">
                            Ubah Data anggota
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    
                                    <form method="POST">
                                        <div class="form-group">
                                            <label>No Induk Mahasiswa</label>
                                            <input class="form-control" name="nim" value="<?php echo $tampil['nim']; ?>" />
                                            
                                        </div>

                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input class="form-control" name="nama" value="<?php echo $tampil['nama']; ?>" />
                                            
                                        </div>

                                        <div class="form-group">
                                            <label>Tempat Lahir</label>
                                            <input class="form-control" name="tempat_lahir" value="<?php echo $tampil['tempat_lahir']; ?>" />
                                            
                                        </div>

                                        <div class="form-group">
                                            <label>Tanggal lahir</label>
                                            <input class="form-control" name="tanggal_lahir" type="date" value="<?php echo $tampil['tanggal_lahir']; ?>" />
                                            
                                        </div>

                                        <div>
                                            <label>Jenis Kelamin</label><br>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" value="L" name="jenis_kelamin" 
                                                <?php echo($jenis_kelamin==L)?"checked":""; ?>> Laki-laki
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" value="P" name="jenis_kelamin" 
                                                <?php echo($jenis_kelamin==P)?"checked":""; ?>> Perempuan
                                            </label>
                                        </div>

                                

                                        <div class="form-group">
                                            <label>Program Studi</label>
                                            <select class="form-control" name="prodi" value="<?php echo $tampil['prodi']; ?>">
                                                <option value="si" <?php if ($prodi=='si')
                                                    {echo "selected";} ?>>Sistem Informatika
                                                </option>
                                                <option value="ti" <?php if ($prodi=='ti')
                                                    {echo "selected";} ?>> Teknik Infotmatika </option>
                                            </select>
                                            
                                        </div>

                                        <div>
                                            <input class="btn btn-success" type="submit" name="simpan">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                        $nim=$_POST['nim'];
                        $nama=$_POST['nama'];
                        $tempat_lahir=$_POST['tempat_lahir'];
                        $prodi=$_POST['prodi'];
                        $jenis_kelamin=$_POST['jenis_kelamin'];
                        $tanggal_lahir=$_POST['tanggal_lahir'];
                        $simpan=$_POST['simpan'];

                        if ($simpan) {
                            $sql = $koneksi ->query("update tb_anggota set nim='$nim' ,nama='$nama' ,tempat_lahir='$tempat_lahir',prodi='$prodi', jenis_kelamin='$jenis_kelamin' ,tanggal_lahir='$tanggal_lahir' where nim='$nim'");

                        if ($sql) {
                            ?>
                            <script type="text/javascript">
                                alert('Data Berhasil diubah');
                                window.location.href="?page=anggota";
                            </script>
                            <?php  
                        }
                    }
                    ?>
                    
