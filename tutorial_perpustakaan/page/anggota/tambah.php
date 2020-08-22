<div class="panel panel-default">
                        <div class="panel-heading">
                            Data anggota
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    
                                    <form method="POST">
                                        <div class="form-group">
                                            <label>Nim</label>
                                            <input class="form-control" name="nim" />
                                            
                                        </div>

                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input class="form-control" name="nama" />
                                            
                                        </div>

                                        <div class="form-group">
                                            <label>Tempat Lahir</label>
                                            <input class="form-control" name="tempat_lahir" />
                                            
                                        </div>

                                        <div class="form-group">
                                            <label>Tanggal Lahir</label>
                                            <input class="form-control" name="tanggal_lahir" type="date" />
                                            
                                        </div>


                                        <div class="form-group">
                                            <label>Jenis Kelamin</label><br>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" value="L" name="jenis_kelamin" /> Laki-laki
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" value="P" name="jenis_kelamin" /> Perempuan
                                            </label>
                                            
                                        </div>
                                       
                                         <div class="form-group">
                                            <label>Program Studi</label>
                                            <select class="form-control" name="prodi" >
                                                <option value="ti">Teknik Informatika</option>
                                                <option value="si">Sistem Informasi</option>
                                                
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
                        $tanggal_lahir=$_POST['tanggal_lahir'];
                        $jenis_kelamin=$_POST['jenis_kelamin'];
                        $prodi=$_POST['prodi'];
                        $simpan=$_POST['simpan'];

                        if ($simpan) {
                            $sql = $koneksi ->query("insert into tb_anggota(nim,nama,tempat_lahir,tanggal_lahir,jenis_kelamin,prodi)
                        value('$nim','$nama','$tempat_lahir','$tanggal_lahir','$jenis_kelamin','$prodi')");

                        if ($sql) {
                            ?>
                            <script type="text/javascript">
                                alert('Data Berhasil diinput');
                                window.location.href="?page=anggota";
                            </script>
                            <?php  
                        }
                    }
                    ?>
                    
